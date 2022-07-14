<!-- navbar sotto nav login -->
<template>
    <nav class="navbar container-fluid navbar-light bg-light">
        <form class="container justify-content-start">
            <button
                class="btn-search btn btn-success me-2"
                type="button"
                v-for="item in menuItems"
                :key="item.id"
            >
                <router-link
                    class="nav-search nav-link text-light"
                    :to="{ name: item.routeName }"
                    >{{ item.label }}</router-link
                >
            </button>
        </form>
    </nav>
</template>

<script>
export default {
    name: "Header",
    data() {
        return {
            //percorso per il logo da nettere nella navbar
            menuItems: [
                {
                    label: "Coins",
                    routeName: "coin",
                },
                {
                    label: "Stocks",
                    routeName: "stock",
                },
            ],
        };
    },
};
</script>

<style lang="scss">
.navbar-search {
    padding: 0 !important;
    .btn-nav-search {
        padding-top: 0 !important;
        background-color: white !important;
        .btn-search {
            padding: 0 !important;
            .nav-search {
                padding: 0 5px !important;
            }
        }
    }
}
</style>
