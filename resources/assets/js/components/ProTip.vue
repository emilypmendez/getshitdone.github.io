<template>
    <a href="#" style="position: fixed; top: 3rem; right: 3rem" @click.prevent="launchTip">
        <i class="fa fa-5x fa-question-circle"></i>
    </a>
</template>

<script>
    export default {
        props: {
            message: {
                type: String,
                required: true,
            },
        },

        methods: {
            launchTip() {
                swal({
                    title: "Pro-tip",
                    html: this.message,
                    type: "question",
                    confirmButtonText: "Got'cha",
                    confirmButtonClass: "btn btn-danger",
                });
            },
        },
    }
</script>
