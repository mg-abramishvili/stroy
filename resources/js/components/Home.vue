<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="header">
                    <h1>Выберите</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div v-for="type in types" class="col-4">
                <swiper ref="IndexSwiper" :options="swiperOptions">
                    <swiper-slide v-for="galleryItem in type.gallery">
                        <div class="swiper-slide-inner" v-bind:style="{ 'background-image': 'url(' + galleryItem + ')' }"></div>
                    </swiper-slide>
                </swiper>
                <div class="score">
                    {{ type.score }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
    import 'swiper/css/swiper.css'

    export default {
        data() {
            return {
                types: {},
                swiperOptions: {
                    slidesPerView: 1,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    },
                },
                slider_prev_next: true,
            }
        },
        created() {
            axios.get('/api/types').then(response => {
                this.types = response.data
            });
        },
        methods: {
        },
        computed: {
            swiper() {
                return this.$refs.IndexFirstSwiper.$swiper
            }
        },
        components: {
            Swiper,
            SwiperSlide,
        },
    }
</script>