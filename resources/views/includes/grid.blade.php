<section id="app-grid" v-cloak>

    <transition-group name="slide-fade" class="clearfix masonry-wrapper" tag="ul">
        <template v-if="currentPage > 0">
            <li v-for="photo in shots" :key="photo.id" :id="'photo-'+ photo.id" class="shot">
                <img :src="photo.image_url" :alt="photo.name">
                <div class="shot-overlay">
                    <div class="shot-overlay-content">
                        <div class="shot-main-information">
                            <h3 class="shot-title" v-text="photo.name"></h3>
                            <span>By</span>
                            <h4>
                                <img :src="photo.user.userpic_url" :alt="photo.user.username">
                                <span v-text="photo.user.username"></span>
                            </h4>
                        </div>
                        <div class="shot-meta">
                            <ul class="list-unstyled">
                                <li><span v-text="photo.times_viewed"></span> Views</li>
                                <li><span v-text="photo.comments_count"></span> Comments</li>
                                <li><span v-text="photo.votes_count"></span> Votes</li>
                            </ul>
                        </div>
                    </div>
                </div>
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