<template>
    <b-form @submit.prevent="onSubmit">
        <b-form-group>
            <b-form-input
                    type="date"
                    placeholder="Due at"
                    v-model="form.data.due_at"
                    :state="form.errors.state('due_at')"
                    @input="onSubmit"
                    required>
            </b-form-input>

            <div class="invalid-feedback" v-text="form.errors.get('due_at')"></div>
        </b-form-group>
    </b-form>
</template>

<script>
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

        data() {
            return {
                form: new Form({
                    due_at: '',
                }),
            };
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
