<template>
    <div>
        <p>This is where you will schedule when certain tasks are due.</p>
        <p>We still need to work on it, though.  Please keep moving.</p>
    </div>
</template>

<script>
    import Form from "../../utilities/Form";

    export default {
        props: {
            initialObjectives: {
                type: Array,
                required: true,
            },

            user: {
                type: Object,
                required: true,
            },
        },

        data() {
            return {
                objectives: [],

                form: new Form({
                    //
                }),
            };
        },

        mounted() {
            // Get component state from props
            this.objectives = this.initialObjectives.slice();

            // Broadcasting consumption
            window.Echo.private(`users.${this.user.id}`)
                .listen("ObjectiveCreated", (e) => {
                    console.log("An objective was created.");

                    //
                })
                .listen("ObjectiveUpdated", (e) => {
                    console.log("An objective was updated.");

                    //
                })
                .listen("ObjectiveDeleted", (e) => {
                    console.log("An objective was deleted.");

                    //
                });
        },

        methods: {
            //
        },
    }
</script>
