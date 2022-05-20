<template>
<!--begin::Header-->
    <div id="tc_header" class="header header-fixed">
        <!--begin::Container-->
        <div class="container-fluid d-flex align-items-stretch justify-content-between">
            <!--begin::Header Menu Wrapper-->
            <div class="header-menu-wrapper header-menu-wrapper-left" id="tc_header_menu_wrapper">
                <!--begin::Header Menu-->
                <div id="tc_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                    <!--begin::Header Nav-->
                    <ul class="menu-nav">

                            <li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here menu-item-active p-0"
                            data-menu-toggle="click" aria-haspopup="true" @click="setBurgerMenu()">
                            <!--begin::Toggle-->
                            <div class="btn  btn-clean btn-dropdown mr-0 p-0" id="tc_aside_toggle">
                                <span class="svg-icon svg-icon-xl svg-icon-primary">

                                    <svg width="24px" height="24px" viewBox="0 0 16 16" class="bi bi-list"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                    </svg>
                                </span>
                            </div>
                            <!--end::Toolbar-->
                        </li>

                    </ul>
                    <!--end::Header Nav-->
                </div>
                <!--end::Header Menu-->
            </div>
            <!--end::Header Menu Wrapper-->
            <!--begin::Topbar-->
            
            <div class="topbar">
                <div class="posicon d-lg-block d-none" v-if="$parent.permissions.includes('pos')">
                    <router-link to="/admin/pos" class="btn btn-primary white mr-2">POS</router-link>
                </div>
                <div class="posicon d-lg-block d-none">
                    <div class="dropdown" :class="{ 'show': showdropdown }">

								<div class="topbar-item" data-toggle="dropdown" data-display="static" :aria-expanded="showdropdown" @click="showDropDown()">
									<div class="btn btn-icon w-auto btn-clean d-flex align-items-center pr-1 pl-3">
										<span class="text-dark-50 font-size-base d-none d-xl-inline mr-3">
                                            {{ username }}</span>
										<span class="symbol symbol-35 symbol-light-success" >
											<span class="symbol-label font-size-h5 " >
												<svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
													<path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
												</svg>
											</span>
										</span>
									</div>
								</div>

								<div class="dropdown-menu dropdown-menu-right" :class="{ 'show': showdropdown }" style="min-width: 150px;">

									<router-link to="/admin/profile" class="dropdown-item">
										<span class="svg-icon svg-icon-xl svg-icon-primary mr-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
												<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
												<circle cx="12" cy="7" r="4"></circle>
											</svg>
										</span>
										Edit Profile
									</router-link>

									<a href="#" class="dropdown-item" @click="logOut()">
										<span class="svg-icon svg-icon-xl svg-icon-primary mr-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-power">
												<path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
												<line x1="12" y1="2" x2="12" y2="12"></line>
											</svg>
										</span>
										Logout
									</a>
								</div>

							</div>
                </div>

            </div>
            <!--end::Topbar-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Header-->
</template>



<script>
export default {
   data(){
       return {
           showdropdown:false,
           username:""
       }
       
   },
    methods: {
        logOut() {
            this.$parent.loading = true;
            let page_url = "/api/admin/logout";

            axios.post(page_url,{},this.token).then(res => {
                this.orders = res.data.data;
                setTimeout(() => { this.$router.push('/admin/login'); }, 1000);
            })
        },
        setBurgerMenu(){
            
            var classList = document.body.classList.value.split(' ');
            console.log(classList);
            if(classList.indexOf('aside-minimize') === -1)
                document.body.classList.add('aside-minimize')
            else
                document.body.classList.remove('aside-minimize')

            this.$emit('setBurgerMenu');
        },
        showDropDown(){
            this.showdropdown = !this.showdropdown
        }
    },
    mounted() {
     
        var token = localStorage.getItem('token');
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };

        console.log(localStorage.getItem('name'));
        if(localStorage.getItem('name')){

            this.username = localStorage.getItem('name')
        }
    },
};
</script>
