<template>
    <b-form @submit.prevent="onSubmit">
        <b-form-group>
            <b-form-input
                    type="date"
                    placeholder="Due at"
                    v-model="form.data.due_at"
                    :state="form.errors.state('due_at')"
                    @input="onSubmit"
                    :min="min"
                    :max="max"
                    required>
            </b-form-input>

            <div class="invalid-feedback" v-text="form.errors.get('due_at')"></div>
        </b-form-group>
    </b-form>
</template>

<script>
    import moment from "moment";
    import Form from "../../utilities/Form";

    export default {
        props: {
            objective: {
                type: Object,
                required: true,
            },
        },

        watch: {
            objective() {
                this.form.data.due_at = this.objective.due_at;
            },
        },

        computed: {
            min() {
                return moment().local().format('Y-MM-DD');
            },

            max() {
                return moment().local().add(2, 'weeks').format('Y-MM-DD');
            },
        },

        data() {
            return {
                form: new Form({
                    due_at: '',
                }),
            };
        },

        mounted() {
            window.moment = moment; // DEBUG ONLY
        },

        methods: {
            onSubmit() {
                this.form.patch(`/objectives/${this.objective.id}/schedule`).then(() => {
                    toastr.success('Your objective has been updated successfully.');
                });
            },
        },
    };
</script>
