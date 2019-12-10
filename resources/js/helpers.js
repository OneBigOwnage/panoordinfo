const linkWithCustomMethod = (method, url) => {
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


const exposeGlobally = (...fns) => fns.forEach(fn => window[fn.name] = fn);

exposeGlobally(linkWithCustomMethod);
