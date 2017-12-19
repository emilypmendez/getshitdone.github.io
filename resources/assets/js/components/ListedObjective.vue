<template>
    <div class="list-group-item d-flex align-items-center">
        <div class="mr-auto">
            <div v-if="objective.is_complete">
                <del>
                    <b class="text-danger" v-if="objective.priority == 1">A</b>
                    <b class="text-info" v-else-if="objective.priority == 2">B</b>
                    <b class="text-muted" v-else-if="objective.priority == 3">C</b>
                    &ndash;
                    <span class="text-success">{{ objective.body }}</span>
                </del>
            </div>
            <div v-else>
                <b class="text-danger" v-if="objective.priority == 1">A</b>
                <b class="text-info" v-else-if="objective.priority == 2">B</b>
                <b class="text-muted" v-else-if="objective.priority == 3">C</b>
                &ndash;
                <span v-text="objective.body"></span>
            </div>
        </div>
        <div>
            <b-dropdown class="mr-1" variant="outline-secondary" size="sm" no-caret>
                <template slot="button-content">
                    <i class="fa fa-ellipsis-h"></i>
                </template>
                <b-dropdown-item @click.prevent="reprioritize(objective)">Reprioritize</b-dropdown-item>
                <b-dropdown-item @click.prevent="reschedule(objective)">Reschedule</b-dropdown-item>
                <b-dropdown-divider></b-dropdown-divider>
                <b-dropdown-item @click.prevent="removeObjective(objective)">Delete</b-dropdown-item>
            </b-dropdown>
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

            reprioritize(objective) {
                window.axios.patch(`/objectives/${objective.id}/reprioritize`, []).then(() => {
                    toastr.success('Your objective has been added queued for reprioritizing.');
                });
            },

            reschedule(objective) {
                window.axios.patch(`/objectives/${objective.id}/reschedule`, []).then(() => {
                    toastr.success('Your objective has been added queued for rescheduling.');
                });
            },

            removeObjective(objective) {
                window.axios.delete(`/objectives/${objective.id}`, []).then(() => {
                    toastr.success('Your objective has been removed.');
                });
            },
        },
    }
</script>
