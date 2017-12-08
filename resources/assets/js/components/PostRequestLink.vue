<template>
    <a :href="href" @click.prevent="onSubmit"><slot></slot></a>
</template>

<script>
    export default {
        props: {
            href: {
                type: String,
                required: true,
            },

            method: {
                type: String,
                default: "POST",
            }
        },

        methods: {
            /**
             * Submits a non-AJAX form request to the server.
             */
            onSubmit() {
                let form = document.createElement('form');
                let token = document.createElement('input');
                let method = document.createElement('input');

                // Create the form
                form.action = this.href;
                form.method = 'POST';

                // Add the CSRF field to the form
                token.type = 'hidden';
                token.name = '_token';
                token.value = document.head.querySelector("meta[name=\"csrf-token\"]").content;

                // Add the METHOD field to the form
                method.type = 'hidden';
                method.name = '_method';
                method.value = this.method;

                // Submit the form.
                form.appendChild(token);
                form.appendChild(method);
                document.body.appendChild(form);
                form.submit();
            },
        },
    }
</script>
