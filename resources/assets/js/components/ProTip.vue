<template>
    <a href="#" style="position: absolute; top: 1rem; right: 1rem; margin: 6px 12px" @click.prevent="launchTip">
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

            title: {
                type: String,
                default: "Pro-tip",
            },
        },

        methods: {
            launchTip() {
                swal({
                    title: this.title,
                    html: this.message,
                    type: "question",
                    confirmButtonText: "OK",
                    confirmButtonColor: "#ca2121",
                });
            },
        },
    }
</script>
