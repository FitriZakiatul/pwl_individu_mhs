<template>
    <div class="container mt-3">
        <div class="row justify-nama-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">TAMBAH DATA MAHASISWA</div>

                    <div class="card-body">
                        <form @submit.prevent="PostStore">
                            <div class="form-group">
                                <label>NIM</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="post.nim"
                                    placeholder="Masukkan NIM"
                                />
                                <div v-if="validation.nim">
                                    <div
                                        class="alert alert-danger mt-1"
                                        role="alert"
                                    >
                                        {{ validation.nim[0] }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>NAMA</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="post.nama"
                                    placeholder="Masukkan Nama"
                                />
                                <div v-if="validation.nama">
                                    <div
                                        class="alert alert-danger mt-1"
                                        role="alert"
                                    >
                                        {{ validation.nama[0] }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button
                                    type="submit"
                                    class="btn btn-md btn-success"
                                >
                                    SIMPAN
                                </button>
                                <button
                                    type="reset"
                                    class="btn btn-md btn-danger"
                                >
                                    RESET
                                </button>
                            </div>
                        </form>
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
            post: {},
            validation: []
        };
    },
    methods: {
        PostStore() {
            let uri = "http://localhost:8000/posts/store";
            this.axios
                .post(uri, this.post)
                .then(response => {
                    this.$router.push({
                        name: "posts"
                    });
                })
                .catch(error => {
                    this.validation = error.response.data.data;
                });
        }
    }
};
</script>
