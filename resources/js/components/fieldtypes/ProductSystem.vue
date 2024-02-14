<template>
    <v-select :options="options" :value="value" @input="update">
        <option></option>
        <option :selected="isOptionSelected(option)" :value="option.label" v-for="option in options"
            v-text="option.label" />
    </v-select>
</template>

<script>
//var options
export default {
    mixins: [Fieldtype],
    data() {
        return {
            options: [],
            selected_val: this.config.endpoint
        }
    },
    mounted() {
        this.$axios.get('/get_objects/' + this.config.endpoint).then(response => {
            var items = response.data;
            var options = [];
            _.each(items, function (item) {
                options.push({
                    label: item.item_label,
                    value: item.item_key
                });
            }, this.config);
            this.options = options;
        });
    },
    methods: {
        isOptionSelected(option) {
            return this.placeholder === false && this.value === undefined
                ? option.value == this.options[0].value
                : option.value == this.value;
        },
        change(event) {
            if (this.resetOnChange) {
                this.reset();
            }
            this.$emit('input', event.target.value)
        },
        reset() {
            this.display = false;
            this.$nextTick(() => this.display = true);
        }
    }
};
</script>
