<template>
    <div>
        <b-card class="mb-3" no-body>
            <div class="card-header">
                {{ getCurrentDate }}
            </div>
            <b-tabs pills card vertical v-model="objectiveDayTabIndex">
                <b-tab style="max-height: 50vh; overflow-y: auto" :title="`Monday (${mondayObjectives.length})`" active>
                    <div class="list-group list-group-flush" v-if="mondayObjectives.length">
                        <listed-objective v-for="objective in mondayObjectives" :key="objective.id" :objective="objective"></listed-objective>
                    </div>
                </b-tab>
                <b-tab style="max-height: 60vh; overflow-y: auto" :title="`Tuesday (${tuesdayObjectives.length})`">
                    <div class="list-group list-group-flush" v-if="tuesdayObjectives.length">
                        <listed-objective v-for="objective in tuesdayObjectives" :key="objective.id" :objective="objective"></listed-objective>
                    </div>
                </b-tab>
                <b-tab style="max-height: 60vh; overflow-y: auto" :title="`Wednesday (${wednesdayObjectives.length})`">
                    <div class="list-group list-group-flush" v-if="wednesdayObjectives.length">
                        <listed-objective v-for="objective in wednesdayObjectives" :key="objective.id" :objective="objective"></listed-objective>
                    </div>
                </b-tab>
                <b-tab style="max-height: 60vh; overflow-y: auto" :title="`Thursday (${thursdayObjectives.length})`">
                    <div class="list-group list-group-flush" v-if="thursdayObjectives.length">
                        <listed-objective v-for="objective in thursdayObjectives" :key="objective.id" :objective="objective"></listed-objective>
                    </div>
                </b-tab>
                <b-tab style="max-height: 60vh; overflow-y: auto" :title="`Friday (${fridayObjectives.length})`">
                    <div class="list-group list-group-flush" v-if="fridayObjectives.length">
                        <listed-objective v-for="objective in fridayObjectives" :key="objective.id" :objective="objective"></listed-objective>
                    </div>
                </b-tab>
                <b-tab style="max-height: 60vh; overflow-y: auto" :title="`Saturday (${saturdayObjectives.length})`">
                    <div class="list-group list-group-flush" v-if="saturdayObjectives.length">
                        <listed-objective v-for="objective in saturdayObjectives" :key="objective.id" :objective="objective"></listed-objective>
                    </div>
                </b-tab>
                <b-tab style="max-height: 60vh; overflow-y: auto" :title="`Sunday (${sundayObjectives.length})`">
                    <div class="list-group list-group-flush" v-if="sundayObjectives.length">
                        <listed-objective v-for="objective in sundayObjectives" :key="objective.id" :objective="objective"></listed-objective>
                    </div>
                </b-tab>
            </b-tabs>
        </b-card>

        <div class="row">
            <div class="col-sm-8 offset-sm-2 text-center">
                <p><a href="/objectives/priority" class="btn btn-lg btn-block btn-danger">Return to Prioritizing</a></p>
                <p><a href="/objectives/create" class="btn btn-lg btn-block btn-danger">Add More Items</a></p>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from "moment";

    import ListedObjective from "./ListedObjective.vue";

    export default {
        components: {
            ListedObjective,
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
            mondayObjectives() {
                return this.objectives.filter(objective => moment(objective.due_at).weekday() == 0);
            },
            tuesdayObjectives() {
                return this.objectives.filter(objective => moment(objective.due_at).weekday() == 1);
            },
            wednesdayObjectives() {
                return this.objectives.filter(objective => moment(objective.due_at).weekday() == 2);
            },
            thursdayObjectives() {
                return this.objectives.filter(objective => moment(objective.due_at).weekday() == 3);
            },
            fridayObjectives() {
                return this.objectives.filter(objective => moment(objective.due_at).weekday() == 4);
            },
            saturdayObjectives() {
                return this.objectives.filter(objective => moment(objective.due_at).weekday() == 5);
            },
            sundayObjectives() {
                return this.objectives.filter(objective => moment(objective.due_at).weekday() == 6);
            },
            getCurrentDate() {
                return moment().startOf("week").add(this.objectiveDayTabIndex, "days").format('MM/DD/Y');
            },
        },

        data() {
            return {
                objectives: [],
                objectiveDayTabIndex: 0,
            };
        },

        mounted() {
            window.moment = moment; // DEBUG ONLY TODO

            // Get component state from props
            this.objectives = this.initialObjectives.slice();

            // Broadcasting consumption
            window.Echo.private(`users.${this.user.id}`)
                .listen("ObjectiveUpdated", (e) => {
                    console.log("An objective was updated.");

                    let index = this.objectives.findIndex(objective => objective.id == e.objective.id);

                    if (!e.objective.due_at || !e.objective.priority)
                        this.objectives.splice(index, 1);
                    else if (index >= 0)
                        this.$set(this.objectives, index, e.objective);
                })
                .listen("ObjectiveDeleted", (e) => {
                    console.log("An objective was deleted.");

                    let index = this.objectives.findIndex(objective => objective.id == e.objective.id);

                    if (index >= 0)
                        this.objectives.splice(index, 1);
                });
        },

        methods: {
            //
        },
    }
</script>
