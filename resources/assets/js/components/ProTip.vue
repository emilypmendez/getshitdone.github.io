<template>
    <a href="#" style="position: absolute; top: 1rem; right: 1rem" @click.prevent="launchTip">
        <i class="fa fa-3x fa-question-circle"></i>
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
