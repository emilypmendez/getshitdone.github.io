<template>
    <div>
        <b-card class="mb-3" no-body>
            <b-tabs pills card vertical>
                <b-tab title="Monday" active>
                    <div class="list-group list-group-flush" v-if="mondayObjectives.length">
                        <listed-objective v-for="objective in mondayObjectives" :key="objective.id" :objective="objective"></listed-objective>
                    </div>
                </b-tab>
                <b-tab title="Tuesday">
                    <div class="list-group list-group-flush" v-if="tuesdayObjectives.length">
                        <listed-objective v-for="objective in tuesdayObjectives" :key="objective.id" :objective="objective"></listed-objective>
                    </div>
                </b-tab>
                <b-tab title="Wednesday">
                    <div class="list-group list-group-flush" v-if="wednesdayObjectives.length">
                        <listed-objective v-for="objective in wednesdayObjectives" :key="objective.id" :objective="objective"></listed-objective>
                    </div>
                </b-tab>
                <b-tab title="Thursday">
                    <div class="list-group list-group-flush" v-if="thursdayObjectives.length">
                        <listed-objective v-for="objective in thursdayObjectives" :key="objective.id" :objective="objective"></listed-objective>
                    </div>
                </b-tab>
                <b-tab title="Friday">
                    <div class="list-group list-group-flush" v-if="fridayObjectives.length">
                        <listed-objective v-for="objective in fridayObjectives" :key="objective.id" :objective="objective"></listed-objective>
                    </div>
                </b-tab>
                <b-tab title="Saturday">
                    <div class="list-group list-group-flush" v-if="saturdayObjectives.length">
                        <listed-objective v-for="objective in saturdayObjectives" :key="objective.id" :objective="objective"></listed-objective>
                    </div>
                </b-tab>
                <b-tab title="Sunday">
                    <div class="list-group list-group-flush" v-if="sundayObjectives.length">
                        <listed-objective v-for="objective in sundayObjectives" :key="objective.id" :objective="objective"></listed-objective>
                    </div>
                </b-tab>
            </b-tabs>
        </b-card>

        <p><a href="#" class="btn btn-lg btn-block btn-danger disabled">Mark List as Complete</a></p>
        <p><a href="/objectives/priority" class="btn btn-lg btn-block btn-danger">Return to Prioritizing</a></p>
        <p><a href="/objectives/create" class="btn btn-lg btn-block btn-danger">Add More Items</a></p>
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
        },

        data() {
            return {
                objectives: [],
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

                    if (index > 0)
                        this.$set(this.objectives, index, e.objective);
                })
                .listen("ObjectiveDeleted", (e) => {
                    console.log("An objective was deleted.");

                    let index = this.objectives.findIndex(objective => objective.id == e.objective.id);

                    if (index > 0)
                        this.objectives.splice(index, 1);
                });
        },

        methods: {
            //
        },
    }
</script>
