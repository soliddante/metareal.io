<x-app-layout>
    <div class="h-screen w-screen flex items-center justify-center ">
        <img src="{{ asset('img/background.jpg') }}" class="w-screen h-screen fixed top-0 right-0 -z-10 object-cover">
        <div class="w-[750px] h-[460px] filter relative opacity-95  flex justify-center items-center bg-[#151515] rounded-[35px]">
            {{-- top border --}}
            <div class="absolute flex items-center justify-center  w-full top-0 left-0">
                <div class="text-center shadow-md text-2xl font-bold pt-5 text-[#40E9F1]">Login</div>
                <img src="{{ asset('img/login-top.svg') }}" class="-z-10 absolute w-full top-0 left-0">

            </div>
            {{-- bottom border --}}
            <img src="{{ asset('img/login-bottom.svg') }}" class="absolute w-full bottom-0 left-0">

            {{-- inner content --}}
            <div class="pt-16">
                {{-- metamask --}}
                <div class="jsc_metamask_login my-4 flex cursor-pointer gap-2 rounded-lg justify-start shadow-sm border-[#0B52BD] border-2 hover:bg-[#0E2E5E]  shadow-[#0B52BD] pl-4 py-3 items-center relative w-[500px]">
                    <img src="{{ asset('img/button-bg.svg') }}" class="absolute -z-10 rounded-lg top-0 left-0 w-full h-full object-cover">
                    <img src="{{ asset('img/metamask-logo.png') }}" class="h-14">
                    <div class="text-white  text-xl">
                        MetaMask
                    </div>
                </div>
                {{-- walletconnect --}}
                <div class="jsc_wc_login  my-4  flex cursor-pointer gap-2 rounded-lg justify-start shadow-sm border-[#0B52BD] border-2 hover:bg-[#0E2E5E]  shadow-[#0B52BD] pl-4 py-3 items-center relative w-[500px]">
                    <img src="{{ asset('img/button-bg.svg') }}" class="absolute -z-10 rounded-lg top-0 left-0 w-full h-full object-cover">
                    <img src="{{ asset('img/walletconnect-logo.png') }}" class="h-14">
                    <div class="text-white  text-xl">
                        WalletConnect
                    </div>
                </div>
                {{-- mail --}}
                <div class="text-center cursor-pointer hover:underline underline-offset-8  text-white w-full text-lg font-medium shadow-sm">
                    OR Login with <strong>EMAIL</strong>
                </div>
            </div>
        </div>
    </div>


    {{-- scripts --}}
    <x-configs.web3connection />
    {{-- <script>
        var userwallet = null;
        ethereum.on('accountsChanged', (accounts) => {
            // window.location.reload();
        });
        ethereum.on('chainChanged', (chainId) => {
            window.location.reload();
        });
        let currentAccount = null;

        //if user is login
        ethereum.request({
            method: 'eth_accounts'
        }).then(function(accounts) {
            console.log(accounts);
            if (accounts.length != 0) {
                userwallet = accounts[0];
                window.location = "{{ route('game') }}"
            }
        })

        $('.jsc_metamask_login').on('click', () => {
            if (userwallet != null) {
                window.location = "{{ route('game') }}"
            }
            metamask_connect();
        })

        function metamask_connect() {
            ethereum.request({
                    method: 'eth_requestAccounts'
                })
                .then(function(accounts) {
                    if (accounts.length != 0) {
                        window.location = "{{ route('game') }}"
                    }
                })
        }
    </script> --}}
</x-app-layout>
