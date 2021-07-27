<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="header">
                    <h1>
                        Уважаемые посетители шоурума,
                        <br>просим Вас выбрать наиболее понравившийся вариант квартиры
                    </h1>
                </div>
            </div>
        </div>
        <div class="row">
            <template v-for="type in types">
                <div class="col-4">
                    <p class="name_title">{{ type.name }}</p>
                    <swiper ref="IndexSwiper" :options="swiperOptions">
                        <swiper-slide v-for="(galleryItem, index) in type.gallery" class="swiper-slide">
                            <div class="swiper-slide-inner" v-bind:style="{ 'background-image': 'url(' + galleryItem + ')' }">
                                <div @click="openModal(type, index)" class="link_to_modal"></div>
                            </div>
                        </swiper-slide>
                    </swiper>
                    <div class="score">
                        <button @click="Score(type)" :id="'btn'+type.id" class="btn btn-score">Голосовать</button>
                        {{ type.score }}
                    </div>
                </div>
                <div :id="'modal' + type.id" class="modal" v-bind:key="'modal' + type.id">
                    <swiper ref="DetailSwiper" :options="swiperOptions">
                        <swiper-slide v-for="galleryItem in type.gallery" :key="galleryItem">
                            <img :src="galleryItem">
                        </swiper-slide>
                    </swiper>
                    <button class="swiper-button-prev"></button>
                    <button class="swiper-button-next"></button>
                    <button @click="closeModal(type)" class="close">&times;</button>
                </div>
            </template>
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
                    loop: true,
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
            Score(type) {
                document.querySelectorAll('.btn-score').forEach(function(button) {
                    button.disabled = true;
                });

                setTimeout(function(){
                    document.querySelectorAll('.btn-score').forEach(function(button) {
                        button.disabled = false;
                    });
                }, 30000);

                axios
                .post(`/api/types`, {
                    id: type.id,
                    score: parseInt(type.score) + 1,
                })
                .then((response => {
                    axios.get('/api/types').then(response => {
                        this.types = response.data
                    });
                }))
                .catch((error) => {
                });
            },
            openModal(type, index) {
                //this.IndexSwiper.slideTo(2, false)
                document.getElementById('modal' + type.id).style.visibility = "visible"                
            },
            closeModal(type) {
                document.getElementById('modal' + type.id).style.visibility = "hidden"
            },
        },
        computed: {
            IndexSwiper() {
                return this.$refs.IndexSwiper.$swiper
            },
            DetailSwiper() {
                return this.$refs.DetailSwiper.$swiper
            }
        },
        components: {
            Swiper,
            SwiperSlide,
        },
    }
</script>