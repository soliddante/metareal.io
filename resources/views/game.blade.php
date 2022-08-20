<x-app-layout>

    @php
        $lands = \App\Models\Land::get();
        Auth::loginUsingId(2, true);
    @endphp
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <div class="h-screen w-screen">
        <div id="map" class="w-screen h-screen"></div>
    </div>
    {{-- top-center --}}
    <div class="top-0 right-0 w-max left-0 mx-auto fixed">
        {{-- clicked-land-detail --}}
        <div class="bg-[#001521] gap-4 jsc_land_detail invisible w-[480px] h-max grid-cols-6 grid  rounded-b-xl text-lg px-6 py-6  text-white ">

            <div class="col-span-3">
                <div class=" text-xl text-[#40E9F1] font-bold"><span class="jsc_clicked_land_name">X</span></div>
                <a href="#" class="">Owner : <span class="jsc_clicked_land_owner text-blue-400 under"> JohnDoe@gmail.com </span> <span class="ml-1"></span></a>
                <div class="">Land Size : <span class="jsc_clicked_land_area">X</span></div>
                <div class="">Land id : <span class="jsc_clicked_land_id">X</span></div>
                <div class="">Geo id : <span class="jsc_clicked_land_geo_id">X</span></div>
                <div class="">Price : <span class="jsc_clicked_land_price">X</span> <span class="ml-1">Soil <img src="{{ asset('img/svg/soil.svg') }}" class="inline-block h-6 ml-1 -mt-2" alt="">
                    </span></div>
            </div>
            <div class="col-span-3">
                <a class="jsc_clicked_land_picture" href="{{ asset('img/buildings/winter/classic.png') }}" data-fancybox>
                    <img src="{{ asset('img/buildings/winter/classic.png') }}" class="jsc_clicked_land_picture h-full w-full object-cover rounded" alt="">
                </a>

            </div>
        </div>
    </div>
    {{-- top-right --}}
    <div class="fixed  top-10 right-10 w-max h-max z-30 ">
        <div class="relative flex  items-center">
            <div class="flex items-center justify-center">
                <img src="{{ asset('img/svg/soil.svg') }}" class="absolute z-40 w-[42px] mb-1" alt="">
                <img src="{{ asset('img/svg/item-box.svg') }}" class="w-[100px] z-30 relative h-[100px]" alt="">
            </div>
            <div class="-ml-10 flex  items-center  bg-gradient-to-b z-20 pl-10 relative text-white border-4 border-[#6BB8FF] from-[#121213] to-[#263762] text-lg text-center rounded-full w-[200px] h-[50px]">
                {{ number_format(auth()->user()->soil) }} SOIL
            </div>
        </div>
        <div class="relative flex  items-center -mt-2">
            <div class="flex items-center justify-center">
                <img src="{{ asset('img/svg/mrg.svg') }}" class="absolute p-1 mt-1 z-40 w-[42px] mb-1" alt="">
                <img src="{{ asset('img/svg/item-box.svg') }}" class="w-[100px] z-30 relative h-[100px]" alt="">
            </div>
            <div class="-ml-10 flex  items-center bg-gradient-to-b z-20 pl-10 relative text-white border-4 border-[#6BB8FF] from-[#121213] to-[#263762] text-lg text-center rounded-full w-[200px] h-[50px]">
                {{ number_format(auth()->user()->mrg) }} MRG
            </div>
        </div>
    </div>
    {{-- top-left profile --}}
    <div class="fixed top-10 flex items-center left-10 w-max h-max z-30">
        <div class="w-[105px] h-[105px] z-20  left-10 relative   ">
            <img src="{{ asset('img/user1.png') }}" class="bottom-[16px] left-0 right-0 mx-auto z-20 absolute">
            <img src="{{ asset('img/svg/profile-circle.svg') }}" class="w-full  h-full absolute">
        </div>
        <div class="jsc_profile -ml-10 rounded-full cursor-pointer w-max pl-20 pr-10 h-[75px] flex items-center text-white border-[5px]  border-[#6BB8FF] bg-gradient-to-b from-[#012D40] to-[#026380]">
            <div>
                <div class="text-2xl font-bold leading-4 pb-0.5  pt-2">Dante Velli</div>
                <div class="text-base">Beggir</div>
            </div>
        </div>
    </div>

    {{-- profule-menu --}}
    <div class="jsc_profile_menu w-[250px] invisible text-xl fixed top-40 rounded-xl left-24 clear-both border-[#6BB8FF] border-2 text-white p-4 bg-[#01181f] bg-opacity-90 ">
        <div class="jsc_profile_menu_close    bg-opacity-25 -mt-1.5 -mr-1 border-white rounded-full bg-white w-6  h-6 flex items-center justify-center pb-0.5 float-right  text-xl cursor-pointer">
            &times
        </div>
        <div class="mt-2 jsc_open_profile_setting_modal border-b border-[#6BB8FF] pb-4 cursor-pointer">
            Profile
        </div>
        <div class="mt-2 global_logout cursor-pointer">
            Logout
        </div>

    </div>
    {{-- bottom-center-modal-land-click --}}
    <div class="jsc_bottom_modal fixed bottom-0  invisible  right-0 left-0 mx-auto w-[850px] h-[32vh] rounded-t-3xl  ">

        <div class="w-full top-0 absolute">
            <div class="top-10 z-30 jsc_close_land_modals cursor-pointer text-2xl pb-0.5 rounded-full bg-white bg-opacity-20 w-8 h-8 flex items-center justify-center text-white absolute right-4">
                &times
            </div>
            <div class="text-2xl  text-[#40E9F1] text-center z-50 h-[78px]  w-[130px] flex items-center justify-center   absolute mx-auto right-0 left-0">
                <span class="jsc_land_name">LAND</span>
            </div>
            <img src="{{ asset('img/svg/modal-land-click-top.svg') }}" class=" absolute w-full block">
        </div>
        <div class="flex w-full gap-8 absolute top-20 text-white z-30 bottom-0    bg-[#001521] justify-center items-center">

            <div class="border-2 relative aspect-square w-[140px] border-white rounded-xl flex items-center justify-center">
                <div class=" w-full h-full object-center">
                    <img src="{{ asset('img/icons/mb-offer.svg') }}" class="-mt-2.5 __theme_hover_shadow_base w-full h-full object-center object-scale-down" alt="">
                    <div class="text-center -mt-10">OFFER</div>
                </div>
            </div>
            <form action="{{ route('building_create') }}">
                <input type="hidden" name="building_id" class="jsc_clicked_state_id" value="0">
                <button type="submit" class="jsc_create_building cursor-pointer border-2 relative aspect-square w-[140px] border-white rounded-xl flex items-center justify-center opacity-60 hover:opacity-100 filter">
                    <div class=" w-full h-full object-center">
                        <img src="{{ asset('img/icons/mb-achive.svg') }}" class="-mt-2.5 __theme_hover_shadow_base w-full h-full object-center object-scale-down">
                        <div class="text-center -mt-10">BUILD</div>
                    </div>
                </button>
            </form>
            <div class="cursor-pointer jsc_buy border-2 relative aspect-square w-[140px] border-white rounded-xl flex items-center justify-center opacity-60 hover:opacity-100 filter">
                <div class=" w-full h-full object-center">
                    <img src="{{ asset('img/icons/mb-shop.svg') }}" class="-mt-2.5 __theme_hover_shadow_base w-full h-full object-center object-scale-down">
                    <div class="text-center -mt-10">BUY</div>
                </div>
            </div>

            <div class="border-2 relative aspect-square w-[140px] border-white rounded-xl flex items-center justify-center opacity-60 hover:opacity-100 filter">
                <div class=" w-full h-full object-center">
                    <img src="{{ asset('img/icons/mb-setting.svg') }}" class="-mt-2.5 __theme_hover_shadow_base w-full h-full object-center object-scale-down">
                    <div class="text-center -mt-10">SETTINGS</div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}
    <div class="jsc_modal jsc_modal_down hidden  fixed  bottom-0 right-0 left-0 mx-auto w-[500px] h-[300px] mb-6  rounded-2xl bg-gray-400 border ">
        <div class="flex justify-end">
            <span class="jsc_modal_close cursor-pointer text-3xl p-4"> &times </span>
        </div>
        <span class="jsc_land_id"></span>
        <button class="p-4 bg-green-400 jsc_buy">buy me</button>
        {{-- <button class="p-4 bg-yellow-400 jsc_change_price">change price</button> --}}
        {{-- //TODO changeprice --}}
        <input type="text" class="jsc_price">
    </div>
    {{-- modal end --}}
    <x-walletconnect-config />


    <script src='https://unpkg.com/@turf/turf@6/turf.min.js'></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.css" rel="stylesheet" />
    <script>
        //window redirect listener
        if (connector.accounts[0] == undefined) {
            window.location = "{{ route('home') }}"
        }
    </script>
    {{-- initial mapbox-gl --}}
    <script>
        let hoveredStateId = null;
        let clickedStateId = null;
        let clickedState = null
        let clickedStateArea = null;
        let user_id = "{{ auth()->user()->id }}"; //const
    </script>
    <script>
        const animateCSS = (element, animation, prefix = 'animate__') =>
            new Promise((resolve, reject) => {
                const animationName = `${prefix}${animation}`;
                const node = document.querySelector(element);
                node.classList.add(`${prefix}animated`, animationName);
                // When the animation ends, we clean the classes and resolve the Promise
                function handleAnimationEnd(event) {
                    event.stopPropagation();
                    node.classList.remove(`${prefix}animated`, animationName);
                    resolve('Animation ended');
                }
                node.addEventListener('animationend', handleAnimationEnd, {
                    once: true
                });
            });
    </script>
    <x-initial />
    {{-- initial geojson land and rules --}}
    <x-addlayer />
    {{-- hover effect --}}
    <x-hover-effect />
    {{-- lands owner status --}}
    <x-lands-owner-status :lands="$lands" />

    <script>
        // land click listener
        map.on('click', 'state-fills', (e) => {
            clickedStateArea = Math.round(turf.area(e.features[0]));
            clickedStateId = e.features[0].id;

            $.ajax({
                type: "get",
                url: "{{ route('api_land_get_object') }}",
                data: {
                    land_id: clickedStateId
                },
                success: function(response) {
                    afterclick(response);
                }
            });


        });
        //buy land
        $('.jsc_buy').on('click', function() {
            $.ajax({
                type: "get",
                url: "{{ route('land_change_owner') }}",
                data: {
                    land_id: clickedStateId,
                    user_id: user_id
                },
                success: function(response) {
                    afterclick(response);
                    window.location.reload();
                }
            });
        })

        //modal
        $('.jsc_modal_close').on('click', function() {
            $(this).closest('.jsc_modal').hide()
        })

        function afterclick(ajax_respone) {
            clickedState = ajax_respone;
            //showmodals
            //// bottom modal

            function show_modals() {
                $(".jsc_bottom_modal , .jsc_land_detail").removeClass(function(index, className) {
                    return (className.match(/(^|\s)animate__\S+/g) || []).join(' ');
                });
                $('.jsc_bottom_modal , .jsc_land_detail').removeClass('invisible');
                $('.jsc_bottom_modal ').addClass('animate__animated animate__slideInUp');
                $('.jsc_land_detail').addClass('animate__animated animate__slideInDown');
            }
            show_modals();


            //debug
            $('.jsc_land_id').text(JSON.stringify(clickedState))

            //check im owner
            if (clickedState.user_id != user_id) {
                $('.jsc_price').prop("disabled", true)
            } else {
                $('.jsc_price').prop("disabled", false)
            }
            //setprice
            $('.jsc_price').val(clickedState.price)

            //
            $('.jsc_clicked_state_id').val(clickedStateId)
            $('.jsc_land_name').text(clickedState.name)
            ///
            $('.jsc_clicked_land_name').text(clickedState.name)
            // $('.jsc_clicked_land_owner').text(clickedState.name)
            $('.jsc_clicked_land_id').text(clickedState.id)
            $('.jsc_clicked_land_geo_id').text(clickedState.geo_id)
            $('.jsc_clicked_land_price').text(clickedState.price)
            $('.jsc_clicked_land_price').text(clickedState.price)
            $('.jsc_clicked_land_picture').attr('href', clickedState.picture)
            $('.jsc_clicked_land_picture').attr('src', clickedState.picture)
            $('.jsc_clicked_land_area').text(clickedStateArea)


            console.log(clickedState);


        }
        //closemodals
        function close_modals() {
            $('.jsc_close_land_modals').on('click', () => {
                $(".jsc_bottom_modal , .jsc_land_detail").removeClass(function(index, className) {
                    return (className.match(/(^|\s)animate__\S+/g) || []).join(' ');
                });
                $('.jsc_bottom_modal').addClass('animate__animated animate__slideOutDown');
                $('.jsc_land_detail').addClass('animate__animated animate__slideOutUp');
                $('.jsc_bottom_modal , .jsc_land_detail').toggleClass('visible', 'invisible');
            })
        }
        close_modals()
    </script>
    <script>
        $('.jsc_profile_menu_close').on('click', () => {
            animateCSS('.jsc_profile_menu', 'fadeOutUp').then(function() {
                $('.jsc_profile_menu').addClass('invisible')
            })
        })

        $('.jsc_profile').on('click', () => {
            $('.jsc_profile_menu').removeClass('invisible')
            animateCSS('.jsc_profile_menu', 'fadeInDown').then(function() {})
        })
    </script>

    <script>
        $('.jsc_open_profile_setting_modal').on('click', () => {

        })
    </script>
    <div class="fixed inset-0 m-auto border-[#6BB8FF] rounded-lg w-[400px] z-40 h-max border-2 bg-black bg-opacity-90  text-white">
        <header>
            <div class="flex justify-end items-center w-full py-4 px-4">
                <ion-icon class="text-2xl filter opacity-80" name="close-circle"></ion-icon>
            </div>
        </header>
        <section id="profile_setting_body" class="py-8">
            <div class="grid gap-y-6 grid-cols-2">
                <div class="col-span-1 pl-[30px] flex  items-center">
                    Avatar :
                </div>
                <div class="col-span-1 flex justify-end pr-[30px] items-center">
                    <div class=" border-[#6BB8FF] rounded-full border block w-[100px] h-[100px]">
                        <div><img src="{{ asset('img/avatar/A1597.png') }}" class="w-full border-2 rounded-full border-[#6BB8FF] cursor-pointer" alt=""></div>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="grid grid-cols-5 px-[30px] gap-2 hidden">
                        {{--  --}}
                        <div><img src="{{ asset('img/avatar/A1578.png') }}" class="w-14 h-14 ring-2 rounded-full ring-[#6BB8FF] cursor-pointer" alt=""></div>
                        <div><img src="{{ asset('img/avatar/A1579.png') }}" class="w-14 h-14 ring-2 rounded-full ring-[#6BB8FF] cursor-pointer" alt=""></div>
                        <div><img src="{{ asset('img/avatar/A1580.png') }}" class="w-14 h-14 ring-2 rounded-full ring-[#6BB8FF] cursor-pointer" alt=""></div>
                        <div><img src="{{ asset('img/avatar/A1581.png') }}" class="w-14 h-14 ring-2 rounded-full ring-[#6BB8FF] cursor-pointer" alt=""></div>
                        <div><img src="{{ asset('img/avatar/A1582.png') }}" class="w-14 h-14 ring-2 rounded-full ring-[#6BB8FF] cursor-pointer" alt=""></div>
                        {{--  --}}
                        <div><img src="{{ asset('img/avatar/A1583.png') }}" class="w-14 h-14 ring-2 rounded-full ring-[#6BB8FF] cursor-pointer" alt=""></div>
                        <div><img src="{{ asset('img/avatar/A1584.png') }}" class="w-14 h-14 ring-2 rounded-full ring-[#6BB8FF] cursor-pointer" alt=""></div>
                        <div><img src="{{ asset('img/avatar/A1585.png') }}" class="w-14 h-14 ring-2 rounded-full ring-[#6BB8FF] cursor-pointer" alt=""></div>
                        <div><img src="{{ asset('img/avatar/A1586.png') }}" class="w-14 h-14 ring-2 rounded-full ring-[#6BB8FF] cursor-pointer" alt=""></div>
                        <div><img src="{{ asset('img/avatar/A1587.png') }}" class="w-14 h-14 ring-2 rounded-full ring-[#6BB8FF] cursor-pointer" alt=""></div>
                        {{--  --}}
                        <div><img src="{{ asset('img/avatar/A1588.png') }}" class="w-14 h-14 ring-2 rounded-full ring-[#6BB8FF] cursor-pointer" alt=""></div>
                        <div><img src="{{ asset('img/avatar/A1589.png') }}" class="w-14 h-14 ring-2 rounded-full ring-[#6BB8FF] cursor-pointer" alt=""></div>
                        <div><img src="{{ asset('img/avatar/A1590.png') }}" class="w-14 h-14 ring-2 rounded-full ring-[#6BB8FF] cursor-pointer" alt=""></div>
                        <div><img src="{{ asset('img/avatar/A1591.png') }}" class="w-14 h-14 ring-2 rounded-full ring-[#6BB8FF] cursor-pointer" alt=""></div>
                        <div><img src="{{ asset('img/avatar/A1592.png') }}" class="w-14 h-14 ring-2 rounded-full ring-[#6BB8FF] cursor-pointer" alt=""></div>
                        {{--  --}}
                        <div><img src="{{ asset('img/avatar/A1593.png') }}" class="w-14 h-14 ring-2 rounded-full ring-[#6BB8FF] cursor-pointer" alt=""></div>
                        <div><img src="{{ asset('img/avatar/A1594.png') }}" class="w-14 h-14 ring-2 rounded-full ring-[#6BB8FF] cursor-pointer" alt=""></div>
                        <div><img src="{{ asset('img/avatar/A1595.png') }}" class="w-14 h-14 ring-2 rounded-full ring-[#6BB8FF] cursor-pointer" alt=""></div>
                        <div><img src="{{ asset('img/avatar/A1596.png') }}" class="w-14 h-14 ring-2 rounded-full ring-[#6BB8FF] cursor-pointer" alt=""></div>
                        <div><img src="{{ asset('img/avatar/A1597.png') }}" class="w-14 h-14 ring-2 rounded-full ring-[#6BB8FF] cursor-pointer" alt=""></div>

                    </div>
                </div>
                <div class="col-span-1 pl-[30px] flex items-center">
                    Username :
                </div>
                <div class="col-span-1 flex items-center">
                    <input type="text" class="rounded w-[170px] bg-black bg-opacity-60 block border py-2 px-4 border-[#6BB8FF] text-[#6BB8FF]">
                </div>
                <div class="col-span-1 pl-[30px] flex items-center">
                    Email Address :
                </div>
                <div class="col-span-1 flex items-center">
                    <input type="text" class="rounded w-[170px] bg-black bg-opacity-60 block border py-2 px-4 border-[#6BB8FF] text-[#6BB8FF]">
                </div>
                <div class="col-span-2 px-[30px]">
                    <div class="rounded bg-[#6BB8FF] text-center w-full py-2  px-4"> Change  </div>

                </div>
            </div>
        </section>
    </div>
</x-app-layout>
