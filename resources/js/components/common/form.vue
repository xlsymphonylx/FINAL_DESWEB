<template>
    <div class="container form-container">
        <div class="group-title">{{ title }}</div>
        <div class="form-group" v-for="field in fields" :key="field.name">
            <label :for="field.name" class="form-title">{{
                field.label
            }}</label>
            <input
                v-if="field.type === 'text'"
                type="text"
                class="form-control"
                :id="field.name"
                v-model="data[field.name]"
            />
            <select
                class="form-control"
                v-if="field.type === 'select'"
                :id="field.name"
                v-model="data[field.name]"
            >
                <option
                    v-for="item in field.items"
                    :key="item.id"
                    :value="item.id"
                >
                    {{ item.description }}
                </option>
                <option selected disabled>Elija una opcion</option>
            </select>
        </div>
        <div class="btn-container">
            <button
                class="btn btn-primary"
                @click="updateMode ? onUpdate() : onSave()"
            >
                Guardar
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        fields: {
            type: Array,
            default: () => [
                {
                    name: "example",
                    type: "text",
                    label: "titulo",
                },
            ],
        },
        editData: {
            type: Object,
            default: () => {},
        },
        title: {
            type: String,
            default: "PLACEHOLDER",
        },
        primaryKey: {
            type: String,
            default: "id",
        },
    },
    data: () => ({
        data: {},
        updateMode: false,
    }),
    watch: {
        editData() {
            if (
                !(
                    this.editData && // 👈 null and undefined check
                    Object.keys(this.editData).length === 0 &&
                    Object.getPrototypeOf(this.editData) === Object.prototype
                )
            ) {
                this.fields.forEach((field) => {
                    this.data[field.name] = this.editData[field.name];
                });
                this.data[this.primaryKey] = this.editData[this.primaryKey];
                this.updateMode = true;
                this.$forceUpdate();
            }
        },
    },
    methods: {
        onSave() {
            this.$emit("save", this.data);
        },
        onUpdate() {
            this.$emit("update", {
                data: this.data,
                primaryKey: this.data[this.primaryKey],
            });
            this.updateMode = false;
        },
        cleanForm() {
            this.fields.forEach((field) => {
                this.data[field.name] = "";
            });
            this.$forceUpdate();
        },
    },
};
</script>

<style scoped>
.btn-container {
    text-align: left;
    margin: 1rem 0;
}
.form-title {
    font-size: 1rem;
}
.form-container {
    padding: 0.25rem;
}
.group-title {
    font-weight: 600;
    margin-top: 1rem;
    margin-bottom: 1rem;
    color: #306ccd;
    font-size: 1rem;
    text-align: center;
}
</style>
