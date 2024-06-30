panel.plugin("felixf/firekit", {
  icons: {
    'layout-row-line': '<path d="M19 11V5H5V11H19ZM19 13H5V19H19V13ZM4 3H20C20.5523 3 21 3.44772 21 4V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V4C3 3.44772 3.44772 3 4 3Z" fill="currentColor"></path>',
    'layout-top-line': '<path d="M21 3C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H21ZM4 10V19H20V10H4ZM4 8H20V5H4V8Z" fill="currentColor"></path>',
    'layout-bottom-line': '<path d="M21 3C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H21ZM4 16V19H20V16H4ZM4 14H20V5H4V14Z" fill="currentColor"></path>',
    'align-top': '<path d="M3 3H21V5H3V3ZM8 11V21H6V11H3L7 7L11 11H8ZM18 11V21H16V11H13L17 7L21 11H18Z" fill="currentColor"></path>',
    'align-vertically': '<path d="M3 11H21V13H3V11ZM18 18V21H16V18H13L17 14L21 18H18ZM8 18V21H6V18H3L7 14L11 18H8ZM18 6H21L17 10L13 6H16V3H18V6ZM8 6H11L7 10L3 6H6V3H8V6Z" fill="currentColor"></path>',
    'align-bottom': '<path d="M3 19H21V21H3V19ZM8 13H11L7 17L3 13H6V3H8V13ZM18 13H21L17 17L13 13H16V3H18V13Z" fill="currentColor"></path>',
    'palette-line': '<path d="M12 2C17.5222 2 22 5.97778 22 10.8889C22 13.9556 19.5111 16.4444 16.4444 16.4444H14.4778C13.5556 16.4444 12.8111 17.1889 12.8111 18.1111C12.8111 18.5333 12.9778 18.9222 13.2333 19.2111C13.5 19.5111 13.6667 19.9 13.6667 20.3333C13.6667 21.2556 12.9 22 12 22C6.47778 22 2 17.5222 2 12C2 6.47778 6.47778 2 12 2ZM10.8111 18.1111C10.8111 16.0843 12.451 14.4444 14.4778 14.4444H16.4444C18.4065 14.4444 20 12.851 20 10.8889C20 7.1392 16.4677 4 12 4C7.58235 4 4 7.58235 4 12C4 16.19 7.2226 19.6285 11.324 19.9718C10.9948 19.4168 10.8111 18.7761 10.8111 18.1111ZM7.5 12C6.67157 12 6 11.3284 6 10.5C6 9.67157 6.67157 9 7.5 9C8.32843 9 9 9.67157 9 10.5C9 11.3284 8.32843 12 7.5 12ZM16.5 12C15.6716 12 15 11.3284 15 10.5C15 9.67157 15.6716 9 16.5 9C17.3284 9 18 9.67157 18 10.5C18 11.3284 17.3284 12 16.5 12ZM12 9C11.1716 9 10.5 8.32843 10.5 7.5C10.5 6.67157 11.1716 6 12 6C12.8284 6 13.5 6.67157 13.5 7.5C13.5 8.32843 12.8284 9 12 9Z"></path>',
    'align-item-horizontal-center-fill': '<path d="M11 4V2H13V4H19C19.5523 4 20 4.44772 20 5V10C20 10.5523 19.5523 11 19 11H13V13H17C17.5523 13 18 13.4477 18 14V19C18 19.5523 17.5523 20 17 20H13V22H11V20H7C6.44772 20 6 19.5523 6 19V14C6 13.4477 6.44772 13 7 13H11V11H5C4.44772 11 4 10.5523 4 10V5C4 4.44772 4.44772 4 5 4H11Z"></path>',
    'align-item-vertical-center-fill': '<path d="M4 19C4 19.5523 4.44772 20 5 20H10C10.5523 20 11 19.5523 11 19V13H13V17C13 17.5523 13.4477 18 14 18H19C19.5523 18 20 17.5523 20 17V13H22V11H20V7C20 6.44772 19.5523 6 19 6L14 6C13.4477 6 13 6.44772 13 7V11H11V5C11 4.44771 10.5523 4 10 4H5C4.44771 4 4 4.44772 4 5L4 11H2V13H4L4 19Z"></path>',
    'align-item-left-fill': '<path d="M3 21V3H5V21H3ZM7 14C7 13.4477 7.44772 13 8 13H16C16.5523 13 17 13.4477 17 14V19C17 19.5523 16.5523 20 16 20H8C7.44772 20 7 19.5523 7 19V14ZM8 4C7.44772 4 7 4.44772 7 5V10C7 10.5523 7.44772 11 8 11H20C20.5523 11 21 10.5523 21 10V5C21 4.44772 20.5523 4 20 4H8Z"></path>',
    'align-item-top-fill': '<path d="M21 3H3V5L21 5V3ZM14 7C13.4477 7 13 7.44772 13 8V16C13 16.5523 13.4477 17 14 17H19C19.5523 17 20 16.5523 20 16V8C20 7.44772 19.5523 7 19 7L14 7ZM4 8C4 7.44772 4.44772 7 5 7L10 7C10.5523 7 11 7.44772 11 8L11 20C11 20.5523 10.5523 21 10 21H5C4.44772 21 4 20.5523 4 20L4 8Z"></path>',
    'align-item-right-fill': '<path d="M19 21V3H21V21H19ZM7 14C7 13.4477 7.44772 13 8 13H16C16.5523 13 17 13.4477 17 14V19C17 19.5523 16.5523 20 16 20H8C7.44772 20 7 19.5523 7 19V14ZM4 4C3.44772 4 3 4.44772 3 5V10C3 10.5523 3.44772 11 4 11H16C16.5523 11 17 10.5523 17 10V5C17 4.44772 16.5523 4 16 4H4Z"></path>',
    'align-item-bottom-fill': '<path d="M4 4C4 3.44772 4.44772 3 5 3H10C10.5523 3 11 3.44772 11 4L11 16C11 16.5523 10.5523 17 10 17H5C4.44772 17 4 16.5523 4 16L4 4ZM14 7C13.4477 7 13 7.44772 13 8V16C13 16.5523 13.4477 17 14 17H19C19.5523 17 20 16.5523 20 16V8C20 7.44772 19.5523 7 19 7L14 7ZM21 19L3 19V21H21V19Z"></path>',
    'file-image-line': '<path d="M15 8V4H5V20H19V8H15ZM3 2.9918C3 2.44405 3.44749 2 3.9985 2H16L20.9997 7L21 20.9925C21 21.5489 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918ZM11 9.5C11 10.3284 10.3284 11 9.5 11C8.67157 11 8 10.3284 8 9.5C8 8.67157 8.67157 8 9.5 8C10.3284 8 11 8.67157 11 9.5ZM17.5 17L13.5 10L8 17H17.5Z"></path>',
  },
  blocks: {
    text: {
      computed: {
        component() {
          const component = "k-" + this.textField.type + "-input";
          if (this.$helper.isComponent(component)) {
            return component;
          }
          // fallback to writer
          return "k-writer";
        },
        textField() {
          return this.field("text", {});
        }
      },
      methods: {
        focus() {
          this.$refs.input.focus();
        }
      },
      template: `
        <component
          :is="component"
          ref="input"
          v-bind="textField"
          :value="content.text"
          :data-size="content.size"
          class="k-block-type-text-input"
          @input="update({ text: $event })"
        />
      `
    },
    heading: {
      computed: {
        isSplitable() {
          return (
            this.content.text.length > 0 &&
            this.$refs.input.isCursorAtStart === false &&
            this.$refs.input.isCursorAtEnd === false
          );
        },
        keys() {
          return {
            Enter: () => {
              if (this.$refs.input.isCursorAtEnd === true) {
                return this.$emit("append", "text");
              }

              return this.split();
            },
            "Mod-Enter": this.split
          };
        },
        levels() {
          return this.field("level", {options: []}).options;
        },
        textField() {
          return this.field("text", {
            marks: true
          });
        }
      },
      methods: {
        focus() {
          this.$refs.input.focus();
        }
      },
      template: `
        <div :data-level="content.level" :data-size="content.size" :data-centered="content.centered" class="k-block-type-heading-input">
     <k-writer
            ref="input"
            class="k-block-type-heading-subline"
            :inline="false"
            :marks="textField.marks"
            :placeholder="textField.placeholder"
            :value="content.subline"
            @input="update({ subline: $event })"
          />
          <k-writer
            ref="input"
            class="k-block-type-heading-text"
            :inline="true"
            :marks="textField.marks"
            :value="content.text"
            @input="update({ text: $event })"
          />
          <k-input
			      v-if="levels.length > 1"
			      ref="level"
			      :empty="false"
			      :options="levels"
			      :value="content.level"
			      type="select"
			      class="k-block-type-heading-level"
			      @input="update({ level: $event })"
		      />
        </div>
        `
    },
    image: {
      computed: {
        captionMarks() {
          return this.field("caption", {marks: true}).marks;
        },
        crop() {
          return this.content.crop || false;
        },
        padding() {
          return "padding-top: " + this.content.padding_top + "; padding-right: " + this.content.padding_right + "; padding-bottom: " + this.content.padding_bottom + "; padding-left: " + this.content.padding_left || false;
        },
        src() {
          if (this.content.location === "web") {
            return this.content.src;
          }
          if (this.content.image[0]?.url) {
            return this.content.image[0].url;
          }
          return false;
        },
        ratio() {
          return this.content.ratio || false;
        }
      },
      template: `
        <k-block-figure
          :caption="content.caption"
          :caption-marks="captionMarks"
          :empty-text="$t('field.blocks.image.placeholder') + ' …'"
          :is-empty="!src"
          empty-icon="image"
          @open="open"
          @update="update"
        >
          <template v-if="src">
            <k-aspect-ratio v-if="ratio" :ratio="ratio" :cover="crop">
              <img :style="padding" :alt="content.alt" :src="src" />
            </k-aspect-ratio>
            <img

              v-else
              :style="padding"
              :alt="content.alt"
              :src="src"
              class="k-block-type-image-auto"
            />
          </template>
        </k-block-figure>
      `
    },
    button: {
      computed: {
        placeholder() {
          return "Button text …";
        }
      },
      template: `
        <input
          type="text"
          placeholder="Button text …"
          :value="content.text"
          @input="update({ text: $event.target.value })"
        />
      `
    },
    datablock: {
      computed: {},
      template: `
        <div @dblclick="open">
          <div v-if="content.datablocks.length">
            <div v-for="(item, index) in content.datablocks" class="datablock-item" :key="index">
              <div class="datablock-headline">{{ item.headline }}</div>
              <div class="datablock-content" v-html="item.text"></div>
            </div>
          </div>
          <div v-else>No questions yet</div>
        </div>
      `
    },
    diashow: {
      computed: {},
      template: `
        <div @dblclick="open">
          Diashow
        </div>
      `
    },
    linklist: {
      computed: {},
      template: `
        <div @dblclick="open">
          <div v-if="content.list.length">
            <span v-for="(item, index) in content.list" class="k-block-type-linklist-item" :key="index">
              <span v-html="item.title"></span>
            </span>
          </div>
          <div v-else>Keine Seiten bisher</div>
        </div>
      `
    },
    logoticker: {
      computed: {},
      template: `
        <div @click="open">
          Logoticker
        </div>
      `
    },
    imageslider: {
      computed: {},
      template: `
        <div @dblclick="open">
          Imageslider
        </div>
      `
    },
    linkslider: {
      computed: {},
      template: `
        <div @click="open">
          <div class="linkslider_image"></div>
          <div class="linkslider_image">Linkslider</div>
          <div class="linkslider_image"></div>
        </div>
      `
    },
    accordion: {
      computed: {
        summaryField() {
          return this.field("summary");
        },
        detailsField() {
          return this.field("details");
        }
      },
      template: `
        <div>
          <details>
            <summary>
                <summary-content>
              <k-writer
                ref="summary"
                :inline="true"
                marks="false"
                :placeholder="summaryField.placeholder || 'Add a summary…'"
                :value="content.summary"
                @input="update({ summary: $event })"
              />
              </summary-content>
            </summary>
            <details-content>
            <k-writer
                ref="details"
                :inline="detailsField.inline || false"
                :marks="detailsField.marks"
                :value="content.details"
                :placeholder="detailsField.placeholder || 'Add some details'"
                @input="update({ details: $event })"
              />
              </details-content>
          </details>
        </div>
      `
    }
    // more blocks
  }
});
