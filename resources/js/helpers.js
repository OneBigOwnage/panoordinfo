/**
 * Create a link that when clicked, submits a form which will send an HTTP call to the given URL.
 *
 * @param {String} method The HTTP method name.
 * @param {Strign} url The URL to make an HTTP call to.
 *
 * @return {String} The generated link.
 */
export const linkWithCustomMethod = (method, url) => {
    const form = document.createElement('form');
    const methodInput = document.createElement('input');
    const tokenInput = document.createElement('input');

    methodInput.name = '_method';
    methodInput.value = method;

    form.appendChild(methodInput);

    tokenInput.name = '_token';
    tokenInput.value = window.csrf_token;

    form.appendChild(tokenInput);

    form.method = 'POST';
    form.action = url;
    form.hidden = true;

    document.body.appendChild(form);

    form.submit();
};

/**
 * Retrieve the X-CSRF-TOKEN from the head of the page.
 *
 * @return {String} The X-CSRF-TOKEN.
 */
export const xsrf_token = () => document.querySelector('meta[name="csrf-token"]').getAttribute('content');

/**
 * Expose a method, as to make it usable throughout the whole application.
 * When
 *
 * @param {Function} fn The function to expose globally
 * @param {String} name The name under which to expose it.
 */
export const exposeGlobally = (fn, name) => window[name] = fn;

exposeGlobally(linkWithCustomMethod, 'linkWithCustomMethod');
exposeGlobally(xsrf_token, 'xsrf_token');
