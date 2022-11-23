const contract = {
    address: '',
    abi: ""
}

const tokenContract = {
    address: "",
    abi: ""
}

var network, networkName, infuraId, chainId, blockExplorerUrl, addEthereumChainParameter;

const networkToUse = "rinkeby";

switch(networkToUse) {
    case "binance":
        network = "https://data-seed-prebsc-1-s1.binance.org:8545";
        networkName = "Binance Testnet";
        infuraId = "4e990aac9bc9418b8112eb1ed524cf91";
        chainId = 97;
        rpc = {
            [chainId]: network,
        };
        blockExplorerUrl = "http://testnet.bscscan.com/";
        
        addEthereumChainParameter = {
            chainId: '0x' + chainId.toString(16),
            chainName: networkName,
            nativeCurrency: {
                name: 'Binance',
                symbol: 'BNB',
                decimals: 18,
            },
            rpcUrls: [network],
            blockExplorerUrls: [blockExplorerUrl],
        }
        break;
    case "mainnet":
        network = "https://bsc-dataseed.binance.org/";
        networkName = "Binance Mainnet";
        infuraId = "4e990aac9bc9418b8112eb1ed524cf91";
        chainId = 56;
        rpc = {
            [chainId]: network,
        };
        blockExplorerUrl = "http://bscscan.com/";
        
        addEthereumChainParameter = {
            chainId: '0x' + chainId.toString(16),
            chainName: networkName,
            nativeCurrency: {
                name: 'Binance',
                symbol: 'BNB',
                decimals: 18,
            },
            rpcUrls: [network],
            blockExplorerUrls: [blockExplorerUrl],
        }
        break;
    default:
        break;
}