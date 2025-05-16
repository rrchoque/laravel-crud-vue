<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h4>Crear Blog</h4></div>
                    <div class="card-body">
                        <form @submit.prevent="editar">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="titulo">Título</label>
                                        <input
                                            type="text"
                                            name="titulo"
                                            id="titulo"
                                            class="form-control"
                                            v-model="blog.titulo"
                                        />
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-floating">
                                        <textarea
                                            class="form-control"
                                            placeholder="Ingrese el contenido"
                                            name="contenido"
                                            id="floatingTextarea2"
                                            style="height: 100px"
                                            v-model="blog.contenido"
                                        ></textarea>
                                        <label for="floatingTextarea2"
                                            >Contenido</label
                                        >
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <button class="btn btn-primary">
                                        Guardar
                                    </button>
                                </div>
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
    name: "editar-blog",
    data() {
        return {
            blog: {
                titulo: "",
                contenido: "",
            },
        };
    },
    mounted() {
        this.obtenerBlog();
    },
    methods: {
        async obtenerBlog() {
            await axios
                .get("/api/blogs/" + this.$route.params.id)
                .then((response) => {
                    const { titulo, contenido } = response.data;
                    this.blog = { titulo, contenido };
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        async editar() {
            await axios
                .put("/api/blogs/" + this.$route.params.id, this.blog)
                .then((response) => {
                    this.$router.push({ name: "mostrarBlogs" });
                })
                .catch((error) => {
                    console.error(error);
                });
        },
    },
};
</script>
