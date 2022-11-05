<template>
    <div class="table-responsive">
        <table class="table-striped table">
            <thead class="text-center">
                <tr>
                    <th scope="col" v-for="header in headers" :key="header">
                        {{ header }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="(row, index) in rows"
                    :key="index"
                    class="text-center"
                >
                    <td
                        v-for="rowData in extractDataFromRow(row)"
                        :key="rowData[primaryKey]"
                    >
                        {{ rowData }}
                    </td>
                    <td class="actions">
                        <i
                            class="fa-solid fa-trash text-danger"
                            @click="onDelete(primaryKeyData(row, index))"
                        ></i>
                        <i
                            class="fa-solid fa-pen-to-square text-warning"
                            @click="onEdit(primaryKeyData(row, index))"
                        ></i>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        headers: {
            type: Array,
            default: () => ["ID", "DESCRIPTION", "ACCIONES"],
        },
        rows: {
            type: Array,
            default: () => [
                {
                    id: "1",
                    name: "TEST",
                },
            ],
        },
        primaryKey: {
            type: String,
            default: "id",
        },
    },
    computed: {
        isActionsEnabled() {
            const foundActions = this.headers.find(
                (header) => header === "ACCIONES"
            );
            return !!foundActions;
        },
    },
    methods: {
        extractDataFromRow(row) {
            const dataOnly = row;
            delete dataOnly["created_at"];
            delete dataOnly["updated_at"];
            return Object.values(dataOnly);
        },
        onDelete(id) {
            this.$emit("delete", id);
        },
        onEdit(id) {
            this.$emit("edit", id);
        },
        primaryKeyData(row) {
            return row[this.primaryKey];
        },
    },
};
</script>

<style scoped>
.actions {
    font-size: 1.5rem;
    display: flex;
}
.actions > i:first-child {
    margin-right: 0.5rem;
}
.table-crud {
    box-sizing: content-box;
    max-width: 10%;
}
</style>
