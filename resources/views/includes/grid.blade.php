<section id="app-grid" v-cloak>

    <transition-group name="slide-fade" name="slide-fade" class="clearfix" tag="ul">
        <template v-if="!isLoading">
            <li v-for="photo in shots" :key="photo.id" :id="'photo-'+ photo.id" class="shot">
                <img :src="photo.image_url" :alt="photo.name">
            </li>
        </template>
        <li v-else class="app-loader" :key="1">
            <div></div>
        </li>
    </transition-group>

</section>