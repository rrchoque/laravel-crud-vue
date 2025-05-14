<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <svg
                        class="logo"
                        viewBox="0 0 128 128"
                        width="24"
                        height="24"
                        data-v-107e4060=""
                    >
                        <path
                            fill="#42b883"
                            d="M78.8,10L64,35.4L49.2,10H0l64,110l64-110C128,10,78.8,10,78.8,10z"
                            data-v-107e4060=""
                        ></path>
                        <path
                            fill="#35495e"
                            d="M78.8,10L64,35.4L49.2,10H25.6L64,76l38.4-66H78.8z"
                            data-v-107e4060=""
                        ></path>
                    </svg>
                </a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link to="/" class="nav-link active">
                                Inicio
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/blogs" class="nav-link">
                                Blogs
                            </router-link>
                        </li>
                        <li class="nav-item dropdown">
                            <router-link to="/contacto" class="nav-link">
                                Contacto
                            </router-link>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input
                            class="form-control me-2"
                            type="search"
                            placeholder="Search"
                            aria-label="Search"
                        />
                        <button class="btn btn-outline-success" type="submit">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <div>
            <router-view></router-view>
        </div>
    </main>
</template>
