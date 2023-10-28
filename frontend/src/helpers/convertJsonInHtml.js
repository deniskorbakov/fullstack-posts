export function convertJsonInHtml(json) {
    let jsonObject = JSON.parse(json);

    let convertInHtml = "";

    jsonObject.map(element => {
        switch (element.type) {
            case "header":
                convertInHtml += `<h${element.data.level}>${element.data.text}</h${element.data.level}>`;
                break;
            case "embded":
                convertInHtml += `<div><iframe width="560" height="315" src="${element.data.embed}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>`;
                break;
            case "paragraph":
                convertInHtml += `<p>${element.data.text}</p>`;
                break;
            case "delimiter":
                convertInHtml += "<hr />";
                break;
            case "image":
                convertInHtml += `<img class="img-fluid" src="${element.data.file.url}" title="${element.data.caption}" /><br /><em>${element.data.caption}</em>`;
                break;
            case "list":
                convertInHtml += "<ul>";
                element.data.items.forEach(function(li) {
                    convertInHtml += `<li>${li}</li>`;
                });
                convertInHtml += "</ul>";
                break;
            default:
                console.log("Unknown element type", element.type);
                break;
        }
    });

    return convertInHtml;
}