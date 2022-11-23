const { ethereum } = window;
const Web3Modal = window.Web3Modal.default;
const WalletConnectProvider = window.WalletConnectProvider.default;
var walletConnectProvider, publicWeb3, provider, isModalShown = false;

if (ethereum) {
    window.web3 = new Web3(ethereum);
    window.contractWeb3 = new web3.eth.Contract(contract.abi, contract.address);
    window.tokenContractWeb3 = new web3.eth.Contract(tokenContract.abi, tokenContract.address);
    ethereum.on('accountsChanged', () => window.location.reload());
    ethereum.on('chainChanged', () => window.location.reload());
}

const toggleModal = () => {
    $('#exampleModal').modal(isModalShown ? 'hide' : 'show');
    isModalShown = !isModalShown;
}

const showModal = () => {
    $('#exampleModal').modal('show');
    isModalShown = true;
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

const accountCreator = setInterval(() => {
    try {
        if(account) {
            var data = new FormData();
            data.append("address", account);
            data.append("username", "default_user");
            data.append("name", "Default User");
            
            var xhr = new XMLHttpRequest();
            xhr.withCredentials = true;
            
            xhr.addEventListener("readystatechange", function() {
              if(this.readyState === 4) {
                if(this.status !== 200) {
                    console.log('Error checking account existence: ' + this.responseText);
                }
              }
            });
            
            xhr.open("POST", "https://myreview.website/recstartoken/api/create-profile");
            
            xhr.send(data);
            
            clearInterval(accountCreator);
        }
    } catch {
        //
    }
}, 2500);

document.querySelector('#myBtn').addEventListener('click', showModal);

document.querySelector('#metamask').addEventListener('click', () => {
    handleConnection('Metamask');
});

document.querySelector('#walletConnect').addEventListener('click', () => {
    handleConnection('WalletConnect');
});

$(document).ready(function () {
    window.publicWeb3 = new Web3(network + infuraId);
    window.publicContractWeb3 = new publicWeb3.eth.Contract(contract.abi, contract.address);

    walletConnectProvider = new WalletConnectProvider({
        infuraId: infuraId,
        rpc: rpc,
        chainId: chainId,
        qrcode: true,
        qrcodeModalOptions: {
            mobileLinks: [
                "metamask",
                "trust",
            ],
        },
    });

    var account = sessionStorage.getItem('account');

    if (account) {
        var connectedWith = sessionStorage.getItem('connectedWith');

        if (connectedWith === 'Metamask') {
            handleConnection('Metamask');
            provider = ethereum;
        } else if (connectedWith === 'WalletConnect') {
            handleConnection('WalletConnect');
            provider = walletConnectProvider;
        }
    }
    
    var acTimer = setInterval(() => {
        var account = sessionStorage.getItem('account');
        if(account) {
            window.account = account;
            clearInterval(acTimer);
        }
    }, 1000)
});

async function handleConnection(providerChoice) {
    if (providerChoice !== 'WalletConnect' && ethereum && parseInt(ethereum.chainId, 16) !== chainId) {
        try {
            await ethereum.request({
                method: 'wallet_switchEthereumChain',
                params: [{ chainId: '0x' + chainId.toString(16) }],
            });
        } catch (e) {
            if (e.code === 4001) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Incompatible network!',
                    text: 'You need to add ' + addEthereumChainParameter.chainName + ' to use our app!',
                });
            } else if (e.code === 4902) {
                try {
                    await ethereum.request({
                        method: 'wallet_addEthereumChain',
                        params: [addEthereumChainParameter],
                    });
                } catch (e) {
                    console.log(e);
                    if (e.code === 4001) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Incompatible network!',
                            text: 'You need to add ' + addEthereumChainParameter.chainName + ' to use our app!',
                        });
                    } else {
                        console.log('Error attempting to add chain: ', e);
                    }
                    return;
                }
            }
            else console.log(e);
            return;
        }
    }

    switch (providerChoice) {
        case "Metamask":
            if (ethereum) {
                provider = ethereum;
                if (provider && provider.isMetaMask) {
                    await handleAccountsRequest(provider);

                    sessionStorage.setItem('connectedWith', "Metamask");
                    document.querySelector('#myBtn').removeEventListener('click', showModal);
                    document.querySelector('#myBtn').addEventListener('click', handleDisconnect);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: "Couldn't find Metamask!",
                        html: "You can download it from " +
                            "<a href='https://metamask.io/'>here</a>" +
                            " or try connecting via WalletConnect!",
                    });
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: "Couldn't find Metamask!",
                    html: "You can download it from " +
                        "<a href='https://metamask.io/'>https://metamask.io/</a>" +
                        " or try connecting via WalletConnect!",
                });
            }
            break;
        case "WalletConnect":
            try {
                await walletConnectProvider.enable().then(async () => {
                    if (walletConnectProvider.chainId !== chainId) {
                        walletConnectProvider.disconnect();
                        Swal.fire({
                            icon: "warning",
                            title: 'Wrong network!',
                            html: "Please switch to " + networkName + " in your wallet app and try connecting again! <br><br>" +
                                " You can refer to the instructions " +
                                "<a href='https://academy.binance.com/en/articles/connecting-metamask-to-binance-smart-chain'> here </a>" + " to add the network",
                        });
                        return;
                    }

                    $('#exampleModal').modal('hide');

                    window.web3 = new Web3(walletConnectProvider);
                    window.tokenContractWeb3 = new web3.eth.Contract(tokenContract.abi, tokenContract.address);
                    window.contractWeb3 = new web3.eth.Contract(contract.abi, contract.address);

                    await handleAccountsRequest(walletConnectProvider);
                    sessionStorage.setItem('connectedWith', "WalletConnect");

                    document.querySelector('#myBtn').removeEventListener('click', showModal);
                    document.querySelector('#myBtn').addEventListener('click', handleDisconnect);

                    provider = walletConnectProvider;

                    walletConnectProvider.on("disconnect", () => {
                        sessionStorage.clear();
                        window.location.reload();
                    });
                });
            } catch (e) {
                if (walletConnectProvider.chainId !== chainId) {
                    if (walletConnectProvider.close) walletConnectProvider.close();
                    else if (walletConnectProvider.disconnect) walletConnectProvider.disconnect();
                    console.log('Issue connecting with WalletConnect: Chain IDs did not match!');
                    return;
                }

                console.log(e);
                return;
            }
            break;
        default:
            if (provider) {
                handleAccountsRequest(provider);
            } else {
                console.log("This is not a ethereum browser!");
            }
            break;
    }
}

async function handleAccountsRequest(provider) {
    var account, balance;
    try {
        await provider.request({ method: 'eth_requestAccounts' });
        account = provider.selectedAddress ? provider.selectedAddress : provider.accounts[0];
        balance = await provider.request({ method: 'eth_getBalance', "params": [account, "latest"] });
        balance = web3.utils.fromWei(balance, 'ether');
    } catch (error) {
        try {
            account = web3._provider.accounts[0];
            balance = await provider.request({ method: 'eth_getBalance', "params": [account, "latest"] });
            balance = web3.utils.fromWei(balance, 'ether');
        } catch (e) {
            console.log("Error while requesting accounts!", error, e);
            sessionStorage.clear();
        }
    }

    if (account || balance) {
        sessionStorage.setItem('account', account);
        document.querySelector('#myBtn').innerText = account.slice(0, 6) + '...' + account.slice(-5);

        sessionStorage.setItem('bnbBalance', balance);
        $('#exampleModal').modal('hide');
    }
}

async function handleDisconnect() {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Disconnect?',
        text: "Are you sure you want to disconnect?",
        icon: 'info',
        confirmButtonText: 'Disconnect',
        reverseButtons: true
    }).then(async (result) => {
        if (result.isConfirmed) {
            var connectedWith = sessionStorage.getItem('connectedWith');

            if (connectedWith === "Metamask") {
                provider = ethereum;
            }

            if (provider.disconnect) provider.disconnect().catch(console.log);

            sessionStorage.clear();

            await sleep(1000);

            window.location.reload();
        }
    })
}

function handleProviderError(e) {
    var errMess;
    try {
        errMess = JSON.parse(e.message.replace("Internal JSON-RPC error.", "")).message;
    } catch {
        errMess = e.message;
    }
    errMess = errMess.replace("execution reverted: ", "");
    Swal.fire({ 
        icon: 'error',
        text: errMess,
    })
}