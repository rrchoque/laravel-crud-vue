<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h4>Crear Blog</h4></div>
                    <div class="card-body">
                        <form @submit.prevent="crear">
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
    name: "crear-blog",
    data() {
        return {
            blog: {
                titulo: "",
                contenido: "",
            },
        };
    },
    methods: {
        async crear() {
            await axios
                .post("/api/blogs", this.blog)
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
