<template>
    <b-form @submit.prevent="onSubmit">
        <div class="row">
            <div class="col-sm-8 offset-sm-2 text-center">
                <b-form-group>
                    <b-form-input type="text" placeholder="Username" v-model="form.data.username"
                                  :state="form.errors.state('username')" required></b-form-input>
                    <div class="invalid-feedback" v-text="form.errors.get('username')"></div>
                </b-form-group>

                <b-form-group>
                    <b-form-input type="password" placeholder="Password" v-model="form.data.password"
                                  :state="form.errors.state('password')" required></b-form-input>
                    <div class="invalid-feedback" v-text="form.errors.get('password')"></div>
                </b-form-group>

                <b-form-group>
                    <b-form-input type="password" placeholder="Confirm Password"
                                  v-model="form.data.password_confirmation"
                                  :state="form.errors.state('password_confirmation')" required></b-form-input>
                    <div class="invalid-feedback" v-text="form.errors.get('password_confirmation')"></div>
                </b-form-group>

                <b-button type="submit" variant="danger" class="btn-lg btn-block" :disabled="this.form.isSubmitting">
                    Create Account
                </b-button>
            </div>
        </div>
    </b-form>
</template>

<script>
    import Form from "../../utilities/Form";

    export default {
        data() {
            return {
                form: new Form({
                    username: '',
                    password: '',
                    password_confirmation: '',
                }),
            };
        },

        methods: {
            onSubmit() {
                this.form.post('/register').then(() => {
                    window.location.href = '/';
                });
            },
        },
    };
</script>
