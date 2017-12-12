<template>
    <b-form @submit.prevent="onSubmit">
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
            <b-form-checkbox v-model="form.data.remember">
                Remember me
            </b-form-checkbox>
        </b-form-group>

        <b-button type="submit" variant="danger" :disabled="this.form.isSubmitting">
            Crack On
        </b-button>
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
                    remember: true,
                }),
            };
        },

        methods: {
            onSubmit() {
                this.form.post('/login').then(() => {
                    window.location.href = '/';
                });
            },
        },
    };
</script>
