<template>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <router-link :to="{ name: 'crearBlog' }" class="btn btn-success">
                <i class="fa-solid fa-circle-plus"></i>
            </router-link>
        </div>

        <div class="col-12">
            <div class="table-responsive">
                <table
                    class="table table-striped table-bordered bg-primary text-white"
                >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Contenido</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="blog in blogs" :key="blog.id">
                            <td>{{ blog.id }}</td>
                            <td>{{ blog.titulo }}</td>
                            <td>{{ blog.contenido }}</td>
                            <td>
                                <router-link
                                    :to="{
                                        name: 'editarBlog',
                                        params: { id: blog.id },
                                    }"
                                    class="btn btn-warning"
                                    ><i class="fa-solid fa-pen-to-square"></i
                                ></router-link>
                                <button
                                    @click="eliminarBlog(blog.id)"
                                    class="btn btn-danger"
                                >
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "blogs",
    data() {
        return {
            blogs: [],
        };
    },
    created() {
        this.obtenerBlogs();
    },
    methods: {
        async obtenerBlogs() {
            await axios
                .get("/api/blogs")
                .then((response) => {
                    this.blogs = response.data;
                    //console.log(this.blogs);
                })
                .catch((error) => {
                    this.blogs = [];
                    console.error(error);
                });
        },
        async eliminarBlog(id) {
            if (confirm("¿Estás seguro de eliminar este blog?")) {
                await axios
                    .delete("/api/blogs/" + id)
                    .then((response) => {
                        this.obtenerBlogs();
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            }
        },
    },
};
</script>
