<template>
    <div>
        <heading class="mb-6">Nova Bug Tracker</heading>

        <card class="bg-90 flex flex-col items-center justify-center" style="min-height: 300px" v-if="loading">
            <svg class="spin fill-80 mb-6"
                 width="69"
                 height="72"
                 viewBox="0 0 23 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M20.12 20.455A12.184 12.184 0 0 1 11.5 24a12.18 12.18 0 0 1-9.333-4.319c4.772 3.933 11.88 3.687 16.36-.738a7.571 7.571 0 0 0 0-10.8c-3.018-2.982-7.912-2.982-10.931 0a3.245 3.245 0 0 0 0 4.628 3.342 3.342 0 0 0 4.685 0 1.114 1.114 0 0 1 1.561 0 1.082 1.082 0 0 1 0 1.543 5.57 5.57 0 0 1-7.808 0 5.408 5.408 0 0 1 0-7.714c3.881-3.834 10.174-3.834 14.055 0a9.734 9.734 0 0 1 .03 13.855zM4.472 5.057a7.571 7.571 0 0 0 0 10.8c3.018 2.982 7.912 2.982 10.931 0a3.245 3.245 0 0 0 0-4.628 3.342 3.342 0 0 0-4.685 0 1.114 1.114 0 0 1-1.561 0 1.082 1.082 0 0 1 0-1.543 5.57 5.57 0 0 1 7.808 0 5.408 5.408 0 0 1 0 7.714c-3.881 3.834-10.174 3.834-14.055 0a9.734 9.734 0 0 1-.015-13.87C5.096 1.35 8.138 0 11.5 0c3.75 0 7.105 1.68 9.333 4.319C16.06.386 8.953.632 4.473 5.057z"
                      fill-rule="evenodd"/>
            </svg>

            <h1 class="text-white text-4xl text-90 font-light mb-6">
                Loading...
            </h1>
        </card>
        <card style="min-height: 300px;padding: 2em;" v-else>
            <div class="flex">
                <div class="flex-no-shrink ml-auto">
                    <router-link :to="{name : 'nova-bug-tracker.create'}" class="btn btn-primary"
                                 dusk="create-button">
                        Create Issue
                    </router-link>
                </div>
            </div>
            <br>
            <b-row>
                <b-col offset="9" md="3" class="my-1">
                    <b-form-group horizontal label="Per page" class="mb-0">
                        <b-form-input type="number" v-model="perPage"/>
                    </b-form-group>
                </b-col>
            </b-row>
            <b-table
                show-empty
                :fields="columns"
                :items="items"
                hover
                stripped
                style="width: 100%"
                :current-page="currentPage"
                :per-page="perPage"
                :filter="filter"
                :sort-by.sync="sortBy"
                :sort-desc.sync="sortDesc"
            >

                <template slot="tags" slot-scope="data">
                    <b class="mr-1"
                       v-for="(tag, id) in data.value "
                       :style="'background :'+ tag.colour">
                        {{tag.name}}
                    </b>
                </template>
                <template slot="show_details" slot-scope="row">
                    <!-- we use @click.stop here to prevent emitting of a 'row-clicked' event  -->
                    <b-button size="sm" @click.stop="row.toggleDetails" class="mr-2">
                        {{ row.detailsShowing ? "Hide" : "Show"}} Details
                    </b-button>
                </template>
                <template slot="row-details" slot-scope="row">
                    <b-card>
                        <b-button size="sm" @click="row.toggleDetails">Hide Details</b-button>
                    </b-card>
                </template>
            </b-table>

            <b-row>
                <b-col md="6" class="my-1">
                    <b-pagination :total-rows="totalRows" :per-page="perPage" v-model="currentPage" class="my-0"/>
                </b-col>
            </b-row>
        </card>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                loading: true,
                columns: [
                    {key: "id", label: "ID", sortable: true, sortDirection: "desc"},
                    {key: "title", label: "Title", sortable: true, sortDirection: "desc"},
                    {key: "priority", sortable: true, sortDirection: "desc"},
                    {key: "severity", sortable: true},
                    {key: "tags", sortable: false},
                    {key: "show_details", label: "detail", sortable: false}
                ],
                items: [
                    {
                        id: 1,
                        title: "Not Cat Friendly",
                        priority: 10,
                        severity: "Severe",
                        tags: [
                            {
                                color: "red",
                                name: "cat"
                            },
                            {
                                color: "navy",
                                name: "hooman"
                            }]
                    },
                    {
                        id: 2,
                        title: "UI needs more comic sans",
                        priority: 10,
                        severity: "Feature",
                        tags: [
                            {color : 'yellow', name: "fonts"}
                        ]
                    }
                ],
                currentPage: 0,
                perPage: 15,
                filter: "",
                sortBy: "id",
                sortDesc: true,
                totalRows: 2
            };
        },
        mounted () {
            this.loading = false;
        }
    };
</script>

<style>
    /* Scoped Styles */
</style>
