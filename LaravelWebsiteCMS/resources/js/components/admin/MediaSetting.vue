<template>
<div class="card card-custom gutter-b bg-white border-0">
    <div class="card-header border-0 align-items-center">
        <h3 class="card-label mb-0 font-weight-bold text-body">Media Setting
        </h3>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-md-3">
                <ul class="nav flex-column nav-pills mb-3" id="v-pills-tab1" role="tablist" aria-orientation="vertical">
                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('large')" :class="{ active: isActive('large') }" href="#large">Large Setting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('medium')" :class="{ active: isActive('medium') }" href="#medium">Medium Setting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('thumbnail')" :class="{ active: isActive('thumbnail') }" href="#thumbnail">Thumbnail Setting</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent1">
                    <div class="tab-pane fade" :class="{ 'active show': isActive('large') }">
                        <LargeMediaSetting />
                    </div>
                    <div class="tab-pane fade" :class="{ 'active show': isActive('medium') }">
                        <MediumMediaSetting />
                    </div>
                    <div class="tab-pane fade" :class="{ 'active show': isActive('thumbnail') }">
                        <ThumbnailMediaSetting  />
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</template>

<script>

import LargeMediaSetting from './settings/LargeMediaSetting';
import MediumMediaSetting from './settings/MediumMediaSetting';
import ThumbnailMediaSetting from './settings/ThumbnailMediaSetting';

export default {
    name: 'Dashboard',
    components: {
        LargeMediaSetting,
        MediumMediaSetting,
        ThumbnailMediaSetting
    },
    data() {
        return {
            activeItem: 'large'
        }
    },

    methods: {
        isActive(menuItem) {
            return this.activeItem === menuItem
        },
        setActive(menuItem) {
            this.activeItem = menuItem
        }
    }
}
</script>
