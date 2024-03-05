/**
 * This handles the photos uploading progress
 */
Alpine.data("photosuploader", () => ({
    isuploading: false,
    progress: "0",
}));

/**
 * Draggable - v1.1.3
 * https://github.com/Shopify/draggable
 */
// import { Sortable, Plugins } from "@shopify/draggable";
// window.Sortable = Sortable;
// window.Plugins = Plugins;

import { Sortable } from "@shopify/draggable";

export default function InitSort() {
    const containerSelector = ".draggable";
    const containers = document.querySelectorAll(containerSelector);

    if (containers.length === 0) {
        return false;
    }

    const sortable = new Sortable(containers, {
        draggable: ".draggable--item",
        mirror: {
            appendTo: containerSelector,
            constrainDimensions: true,
            cursorOffsetX: -20,
            cursorOffsetY: -20,
        },

        classes: {
            mirror: ["opacity-100", "blur-lg"],
            "draggable:over": [
                "draggable--over",
                "bg-red-200",
                "bg-opacity-10",
            ],
            "source:original": ["block"],
        },
    });

    sortable.on("drag:start", (event) => {
        const { source } = event;
        const firstDiv = containers[0].children[0];

        if (source == firstDiv) {
            event.cancel();
        }
    });

    return sortable;
}

window.Sortable = InitSort;
