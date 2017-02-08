<section id="app-grid" v-cloak>

    <transition-group name="slide-fade" class="clearfix" tag="ul">
        <template v-if="currentPage > 0">
            <li v-for="photo in shots" :key="photo.id" :id="'photo-'+ photo.id" class="shot">
                <img :src="photo.image_url" :alt="photo.name">
            </li>
        </template>
    </transition-group>

    <transition name="slide-fade">
        <div v-if="isLoading" class="app-loader">
            <div></div>
        </div>
    </transition>

    <transition name="slide-fade">
        <div v-if="!isLoading && currentPage < 1000" id="app-pagination" class="text-center">
            <a href="#" @click.prevent="fetch" class="btn btn-success">More Awesome Shots!</a>
        </div>
    </transition>

</section>