import Errors from "./Errors";

export default class Form {
    /**
     * Create a new Form instance.
     *
     * @param data
     */
    constructor(data) {
        this.original = JSON.parse(JSON.stringify(data));
        this.data = data;
        this.hasChanges = false;
        this.isSubmitting = false;

        this.errors = new Errors();
    }

    /**
     * Send a POST request to the given URL.
     *
     * @param {string} url
     */
    post(url) {
        this.data["_method"] = "POST";

        return this.submit("post", url);
    }

    /**
     * Send a PUT request to the given URL.
     * .
     * @param {string} url
     */
    put(url) {
        this.data["_method"] = "PUT";

        return this.submit("post", url);
    }

    /**
     * Send a PATCH request to the given URL.
     * .
     * @param {string} url
     */
    patch(url) {
        this.data["_method"] = "PATCH";

        return this.submit("post", url);
    }

    /**
     * Send a DELETE request to the given URL.
     *
     * @param {string} url
     */
    delete(url) {
        this.data["_method"] = "DELETE";

        return this.submit("post", url);
    }

    /**
     * Mark this form as having been changed.
     */
    markAsChanged() {
        this.hasChanges = true;
    }

    /**
     * Submit the form.
     *
     * @param type
     * @param url
     * @returns {Promise}
     */
    submit(type, url) {
        this.isSubmitting = true;

        return new Promise((resolve, reject) => {
            axios({
                method: type,
                url: url,
                data: this.generateFormData(),
            })
                .then(response => {
                    this.isSubmitting = false;
                    this.hasChanges = false;

                    this.errors.clear();

                    resolve(response.data);
                })
                .catch(error => {
                    this.isSubmitting = false;

                    this.onFail(error);

                    reject(error.response.data);
                });
        });
    }

    /**
     * Handle a failed form submission.
     *
     * @param error
     */
    onFail(error) {
        if (error.response) {
            switch (error.response.status) {
            case 401:
                toastr.error("You need to be logged in before you can do that!", "Not logged in");

                break;
            case 403:
                toastr.error("You weren't allowed to do that.", "Unauthorized");

                if (typeof error.response.data.redirect != "undefined") {
                    window.location.href = error.response.data.redirect;
                }

                break;
            case 422:
                if (typeof error.response.data == "string") {
                    toastr.error(error.response.data, "Whoops!");

                    break;
                }

                toastr.error("Some issues were found with your submission that you need to fix.", "Whoops!");

                this.errors.record(error.response.data);

                break;
            default:
                toastr.error("Some unrecognized response came back from the server.", "Whoops!");
            }
        }
        else {
            toastr.error("For some reason, there was no response back from the server.  Did your internet go out?", "Whoops!");
        }
    }

    /**
     * Generate a FormData object from the given data.
     *
     * @returns {FormData}
     */
    generateFormData() {
        let formData = new FormData();

        _.forOwn(this.data, (value, key) => {
            this.formatFormData(formData, value, key);
        });

        return formData;
    }

    /**
     * Appends to FormData in a way based on the type of data presented in value.
     *
     * @param formData
     * @param value
     * @param key
     */
    formatFormData(formData, value, key) {
        if (Array.isArray(value)) {
            // PHP requires each array field key to be concatenated with an "[]".
            for (let i = 0; i < value.length; i++)
                this.formatFormData(formData, value[i], key + `[${i}]`);
        }
        else if (value === null) {
            formData.append(key, "");
        }
        else if (typeof value === "boolean") {
            if (value)
                formData.append(key, 1);
            else
                formData.append(key, 0);
        }
        else if (typeof value === "object" && !(value instanceof File)) {
            _.forOwn(value, (innerObjectValue, innerObjectKey) => {
                this.formatFormData(formData, innerObjectValue, `${key}[${innerObjectKey}]`);
            });
        }
        else {
            formData.append(key, value);
        }
    }
}