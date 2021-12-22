<template>
    <div class="container">
        <div class="row mt-4">
            <h1>Gallery</h1>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mt-4 mb-4" v-for="painting in paintings">
                <div class="card">
                    <img class="card-img-top" :src=painting.path>
                    <div class="card-body">
                        <h2 class="card-title">{{ painting.title }}</h2>
                        <p class="card-text">
                            {{ painting.artist }}, {{ painting.creation }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                paintings: []
            }
        },

        mounted() {
            this.getPaintings();
        },

        methods: {
            getPaintings() {
                axios.get('/api/gallery')
                    .then(response => this.paintings = response.data.data)
                    .catch(error => console.log(error))
            }
        }
    }
</script>