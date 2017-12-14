<template>
    <div class="list-group-item d-flex align-items-center">
        <div class="mr-auto">
            <div>
                <span class="text-muted">#{{ objective.priority }}</span>
                {{ objective.body }}
            </div>
        </div>
        <div v-if="objective.is_complete">
            <button type="button" class="btn btn-sm btn-danger" @click.prevent="markAsIncomplete(objective)">
                <i class="fa fa-check"></i>
            </button>
        </div>
        <div v-else>
            <button type="button" class="btn btn-sm btn-outline-secondary" @click.prevent="markAsComplete(objective)">
                <i class="fa fa-check"></i>
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            objective: {
                type: Object,
                required: true,
            },
        },

        methods: {
            /**
             * Mark objective as complete.
             *
             * @param objective
             */
            markAsComplete(objective) {
                window.axios.patch(`/objectives/${objective.id}/complete`, []).then(() => {
                    toastr.success('Your objective has been marked as complete.');
                });
            },

            /**
             * Mark objective as complete.
             *
             * @param objective
             */
            markAsIncomplete(objective) {
                window.axios.patch(`/objectives/${objective.id}/incomplete`, []).then(() => {
                    toastr.success('Your objective has been marked as incomplete.');
                });
            },
        },
    }
</script>
