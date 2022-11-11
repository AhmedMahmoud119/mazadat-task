<template>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">language</i>
                            </div>
                            <h4 class="card-title">
                                Mazadat
                            </h4>
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <br>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <td>Key</td>
                                        <td>Value</td>
                                    </tr>
                                    </thead>
                                    <tr v-for="row in table">
                                        <td>{{row.key}}</td>
                                        <td>{{row.value}}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-8">
                                <form id="frm" @submit.prevent="getFormValues">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label>Select Category</label>

                                            <select class="form-control" @change="onChangeCategory($event)">
                                                <option value="">Select</option>
                                                <option v-for="category in Categories"
                                                        selectedKey="Category"
                                                        :selectedValue="category.name"
                                                        :childs='JSON.stringify(category.children)' :value="category.id">
                                                    {{ category.name }}
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Select Sub Category</label>
                                            <select class="form-control" @change="onChangeChild($event)">
                                                <option value="">Select</option>
                                                <option v-for="CategoryChild in CategoryChilds"
                                                        :subCategorySelected="CategoryChild.name"
                                                        selectedKey="Sub Category"
                                                        :selectedValue="CategoryChild.name"
                                                        :value="CategoryChild.id">
                                                    {{ CategoryChild.name }}
                                                </option>
                                            </select>
                                        </div>


                                        <div v-for="Property in Properties" class="form-group">
                                            <label>{{ Property.name }}</label>
                                            <select class="form-control">
                                                <option value="">Select</option>
                                                <option v-for="option in Property.options" :value="option.id"
                                                        :selectedKey="Property.name"
                                                        :selectedValue="option.name">
                                                    {{ option.name }}
                                                </option>
                                            </select>
                                        </div>


                                        <input type="submit" class="btn btn-success">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            Categories: null,
            CategoryChilds: null,
            Properties: null,
            table: [],
        }
    },

    mounted() {
        axios.get("get-all-cats")
            .then((response) => {
                const data = response.data;
                this.Categories = data;
            });
    },
    methods: {
        onChangeCategory(event) {
            var childs = event.target.options[event.target.options.selectedIndex].getAttribute('childs');
            this.CategoryChilds = JSON.parse(childs);
        },
        onChangeChild(event) {
            axios.get("get-properties", {
                params: {
                    category_child_id: event.target.value
                }
            }).then((response) => {
                const data = response.data;
                this.Properties = data;
            });
        },

        getFormValues (submitEvent) {
            this.table=[];
            Object.values(submitEvent.target.elements).forEach((value) => {
                if(value.options) {
                    var data = {
                        key : value.options[value.options.selectedIndex].getAttribute('selectedKey'),
                        value : value.options[value.options.selectedIndex].getAttribute('selectedValue'),
                    }
                    if(data.value){
                        this.table.push(data)
                    }
                }
            });
        }

    }
}
</script>
