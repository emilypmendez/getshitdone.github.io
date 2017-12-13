<template>
    <div>
        <b-form @submit.prevent="onSubmit">
            <b-form-group>
                <b-input-group>
                    <b-form-input placeholder="Objective" v-model="form.data.body" :state="form.errors.state('body')" required></b-form-input>

                    <b-input-group-button slot="right">
                        <button type="submit" class="btn btn-secondary" :disabled="this.form.isSubmitting">
                            Add
                        </button>
                    </b-input-group-button>
                </b-input-group>

                <div class="invalid-feedback" v-text="form.errors.get('body')"></div>
            </b-form-group>
        </b-form>

        <ul class="list-group text-left" v-if="objectives.length">
            <li class="list-group-item" v-for="objective in objectives" :key="objective.id" v-text="objective.body"></li>
        </ul>
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
                    body: '',
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

                    this.objectives.unshift(e.objective);
                })
                .listen("ObjectiveUpdated", (e) => {
                    console.log("An objective was updated.");

                    let index = this.objectives.findIndex(objective => objective.id == e.objective.id);
                    this.$set(this.objectives, index, e.objective);
                })
                .listen("ObjectiveDeleted", (e) => {
                    console.log("An objective was deleted.");

                    let index = this.objectives.findIndex(objective => objective.id == e.objective.id);
                    this.objectives.splice(index, 1);
                })
        },

        methods: {
            onSubmit() {
                this.form.post('/objectives').then(() => {
                    this.form.data.body = "";

                    toastr.success('Your objective has been added successfully.');
                });
            },
        },
    };
</script>
