<script src="{{ asset('js/walletconnect.js') }}"></script>
<script>
    $('.global_logout').on('click', () => {
        logout();
    })
    $('.jsc_wc_login').on('click', () => {
        login();
    })
    connector.on("connect", (error) => {
        if (error) {
            throw error;
        }
        window.location.reload();
    });

    function login() {
        if (!connector.connected) {
            connector.createSession()
        } else {
            console.log(
                connector.accounts[0]
            )
        }
    }

    function logout() {
        if (connector.connected) {
            connector.killSession()
            window.location.reload();

        }
    }
    //if connector is ok redirect to game
    if (connector.accounts[0] != undefined) {
        window.location = "{{ route('game') }}"
    }
</script>
<script></script>
