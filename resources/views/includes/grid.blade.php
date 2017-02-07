<section id="app-grid">

    <template v-if="!isLoading" v-cloak>
        <transition-group name="fade" class="clearfix" tag="ul">
            <li v-for="photo in shots" :key="photo.id" :id="'photo-'+ photo.id" class="shot">
                <img :src="photo.image_url" :alt="photo.name">
            </li>
        </transition-group>
    </template>

</section>