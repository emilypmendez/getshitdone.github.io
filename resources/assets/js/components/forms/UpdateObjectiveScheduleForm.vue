<template>
    <div class="card" style="max-height: 60vh; overflow-y: auto">
        <b-tabs card>
            <b-tab :title="`<b>A</b> (${level1Objectives.length})`" active no-body>
                <ul class="list-group list-group-flush text-left" v-if="level1Objectives.length">
                    <li class="list-group-item d-flex align-items-center" v-for="objective in level1Objectives" :key="objective.id">
                        <div class="mr-auto">
                            <p>{{ objective.body }}</p>

                            <update-schedule-on-objective :objective="objective"></update-schedule-on-objective>
                        </div>
                        <div>
                            <button type="button" class="btn btn-sm btn-outline-secondary" @click.prevent="deleteObjective(objective)">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </li>
                </ul>
                <div class="card-body" v-else>
                    <p class="mb-0">
                        Nothing else needed to schedule.
                    </p>
                </div>
            </b-tab>
            <b-tab :title="`<b>B</b> (${level2Objectives.length})`" no-body>
                <ul class="list-group list-group-flush text-left" v-if="level2Objectives.length">
                    <li class="list-group-item d-flex align-items-center" v-for="objective in level2Objectives" :key="objective.id">
                        <div class="mr-auto">
                            <p>{{ objective.body }}</p>

                            <update-schedule-on-objective :objective="objective"></update-schedule-on-objective>
                        </div>
                        <div>
                            <button type="button" class="btn btn-sm btn-outline-secondary" @click.prevent="deleteObjective(objective)">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </li>
                </ul>
                <div class="card-body" v-else>
                    <p class="mb-0">
                        Nothing else needed to schedule.
                    </p>
                </div>
            </b-tab>
            <b-tab :title="`<b>C</b> (${level3Objectives.length})`" no-body>
                <ul class="list-group list-group-flush text-left" v-if="level3Objectives.length">
                    <li class="list-group-item d-flex align-items-center" v-for="objective in level3Objectives" :key="objective.id">
                        <div class="mr-auto">
                            <p>{{ objective.body }}</p>

                            <update-schedule-on-objective :objective="objective"></update-schedule-on-objective>
                        </div>
                        <div>
                            <button type="button" class="btn btn-sm btn-outline-secondary" @click.prevent="deleteObjective(objective)">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </li>
                </ul>
                <div class="card-body" v-else>
                    <p class="mb-0">
                        Nothing else needed to schedule.
                    </p>
                </div>
            </b-tab>
        </b-tabs>
    </div>
</template>

<script>
    import Form from "../../utilities/Form";

    import UpdateScheduleOnObjective from "./UpdateScheduleOnObjective.vue";

    export default {
        components: {
            UpdateScheduleOnObjective,
        },

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

        computed: {
            level1Objectives() {
                return this.objectives.filter(objective => objective.priority == 1);
            },

            level2Objectives() {
                return this.objectives.filter(objective => objective.priority == 2);
            },

            level3Objectives() {
                return this.objectives.filter(objective => objective.priority == 3);
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
                })
                .listen("ObjectiveDeleted", (e) => {
                    console.log("An objective was deleted.");
                });
        },

        methods: {
            /**
             * Delete an objective.
             *
             * @param objective
             */
            deleteObjective(objective) {
                window.axios.delete(`/objectives/${objective.id}`).then(() => {
                    toastr.success('Your objective has been deleted successfully.');
                });
            },
        },
    };
</script>
