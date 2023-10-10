export function showDeclensionsComments(countFigure) {
    const typesDeclensionsComments = [
        "комментарий",
        "комментария",
        "комментариев",
    ]

    let residue = countFigure % 100;

    let declensionsComments;

    if(residue >= 11 && residue <= 19) {
        declensionsComments = typesDeclensionsComments[2];
    }
    else {
        let i = countFigure % 10;

        switch(i) {
            case (1): declensionsComments = typesDeclensionsComments[0]; break;
            case (2):
            case (3):
            case (4): declensionsComments = typesDeclensionsComments[1]; break;
            default: declensionsComments = typesDeclensionsComments[2];
        }
    }

    return countFigure + ' ' + declensionsComments;
}