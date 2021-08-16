<template>
  <div :class="keyboardClass"></div>
</template>

<script>
import Keyboard from "simple-keyboard";
import "simple-keyboard/build/css/index.css";
import layout from "simple-keyboard-layouts/build/layouts/russian";

export default {
  name: "SimpleKeyboard",
  props: {
    keyboardClass: {
      default: "simple-keyboard",
      type: String
    },
    input: {
      type: String
    }
  },
  data: () => ({
    keyboard: null
  }),
  mounted() {
    this.keyboard = new Keyboard(this.keyboardClass, {
      onChange: this.onChange,
      onKeyPress: this.onKeyPress,
      //...layout,
  layout: {
    default: [
      "1 2 3 4 5 6 7 8 9 0",
      "Й Ц У К Е Н Г Ш Щ З Х Ъ",
      "Ф Ы В А П Р О Л Д Ж Э",
      "Я Ч С М И Т Ь Б Ю ! ? , .",
      "{shift} {space} {bksp}"
    ],
    shift: [
      "1 2 3 4 5 6 7 8 9 0",
      "Q W E R T Y U I O P",
      'A S D F G H J K L',
      "Z X C V B N M ! ? , .",
      "{shift} {space} {bksp}"
    ]},
        display: {
    '{bksp}': '←',
    '{enter}': 'ENTER',
    '{shift}': 'RU/EN',
    '{space}': '_______________',
    }
    });
  },
  methods: {
    onChange(input) {
      this.$emit("onChange", input);
    },
    onKeyPress(button) {
      this.$emit("onKeyPress", button);

      /**
       * If you want to handle the shift and caps lock buttons
       */
      if (button === "{shift}" || button === "{lock}") this.handleShift();
    },
    handleShift() {
      let currentLayout = this.keyboard.options.layoutName;
      let shiftToggle = currentLayout === "default" ? "shift" : "default";

      this.keyboard.setOptions({
        layoutName: shiftToggle
      });
    }
  },
  watch: {
    input(input) {
      this.keyboard.setInput(input);
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
