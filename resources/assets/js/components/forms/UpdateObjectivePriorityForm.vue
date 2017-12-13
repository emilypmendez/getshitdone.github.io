<template>
    <div>
        <ul class="list-group text-left" v-if="objectives.length">
            <li class="list-group-item d-flex align-items-center" v-for="objective in objectives" :key="objective.id">
                <div class="mr-auto">
                    <p>{{ objective.body }}</p>

                    <div class="btn-group" role="group">
                        <button type="button" class="btn px-5"
                                :class="[{ 'btn-danger': objective.priority == 1 }, { 'btn-secondary': objective.priority != 1 }]"
                                @click.prevent="changePriority(objective, 1)">
                            1
                        </button>
                        <button type="button" class="btn px-5"
                                :class="[{ 'btn-danger': objective.priority == 2 }, { 'btn-secondary': objective.priority != 2 }]"
                                @click.prevent="changePriority(objective, 2)">
                            2
                        </button>
                        <button type="button" class="btn px-5"
                                :class="[{ 'btn-danger': objective.priority == 3 }, { 'btn-secondary': objective.priority != 3 }]"
                                @click.prevent="changePriority(objective, 3)">
                            3
                        </button>
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-sm btn-outline-secondary" @click.prevent="deleteObjective(objective)">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
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
            };
        },

        mounted() {
            // Get component state from props
            this.objectives = this.initialObjectives.slice();

            // Broadcasting consumption
            window.Echo.private(`users.${this.user.id}`)
                .listen("ObjectiveUpdated", (e) => {
                    console.log("An objective was updated.");

                    let index = this.objectives.findIndex(objective => objective.id == e.objective.id);
                    this.$set(this.objectives, index, e.objective);
                })
                .listen("ObjectiveDeleted", (e) => {
                    console.log("An objective was deleted.");

                    let index = this.objectives.findIndex(objective => objective.id == e.objective.id);
                    this.objectives.splice(index, 1);
                });
        },

        methods: {
            /**
             * Set the priority of the given objective to the given level.
             *
             * @param objective
             * @param priority
             */
            changePriority(objective, priority) {
                let payload;

                if (objective.priority == priority)
                    payload = {priority: null};
                else
                    payload = {priority};

                window.axios.patch(`/objectives/${objective.id}/priority`, payload).then(data => {
                    toastr.success('Your objective\'s priority has been changed successfully.');
                });
            },

            /**
             * Delete an objective.
             *
             * @param objective
             */
            deleteObjective(objective) {
                window.axios.delete(`/objectives/${objective.id}`).then(() => {
                    toastr.success('Your objective\'s priority has been deleted successfully.');
                });
            },
        },
    };
</script>
