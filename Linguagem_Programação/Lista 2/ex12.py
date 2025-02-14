def cadastrar(nome_produtos, quantidade_produtos, preco_produtos):
    for i in range(3):
        nome = input('Digite o nome do produto: ')
        quantidade = int(input('Digite a quantidade do produto: '))
        preco = float(input('Digite o preço do produto: '))
        nome_produtos.append(nome)
        quantidade_produtos.append(quantidade)
        preco_produtos.append(preco)
    print('Produtos cadastrados com sucesso!\n')


def mostrar(nome_produtos, quantidade_produtos, preco_produtos):
    print('Nome        Quantidade        Preço')
    for nome, quantidade, preco in zip(nome_produtos, quantidade_produtos, preco_produtos):
        print("{:<12} {:<17} {:.2f}".format(nome, quantidade, preco))


def estoque_minimo(nome_produtos, quantidade_produtos):
    print('Produtos com estoque mínimo:')
    for nome, quantidade in zip(nome_produtos, quantidade_produtos):
        if quantidade <= 3:
            print(nome)


def reajuste_aumento(nome_produtos, preco_produtos):
    print('Reajuste de aumento de 5%:')
    for i, nome in enumerate(nome_produtos):
        if nome.startswith('c'):
            novo_preco = preco_produtos[i] * 1.05
            preco_produtos[i] = novo_preco
            print("{}: R$ {:.2f}".format(nome, novo_preco))


def alterar_nome(nome_produtos):
    for i, nome in enumerate(nome_produtos):
        if nome == 'camisa':
            nome_produtos[i] = nome.replace('camisa', 'blusa')
    print('Nome do produto alterado com sucesso!\n')


def capitalize_nomes(nome_produtos):
    for i, nome in enumerate(nome_produtos):
        nome_produtos[i] = nome.capitalize()
    print('Nomes dos produtos capitalizados com sucesso!\n')


def main():
    nome_produtos = []
    quantidade_produtos = []
    preco_produtos = []

    while True:
        print('\n' + '.' * 92)
        print('Programa para Gerenciamento de Estoque de Produtos'.center(92))
        print('.' * 92 + '\n')
        print('1 - Cadastro do nome, quantidade e preço do produto')
        print('2 - Apresentação de todos os produtos')
        print('3 - Apresentação de estoque mínimo')
        print('4 - Aplicação de reajuste de aumento 5%')
        print('5 - Alteração de nome de produto de camisa para blusa')
        print('6 - Capitalize todos os nomes de produtos')
        print('7 - Sair\n')

        opcao = input('Escolha uma opção: ')

        if opcao == '1':
            cadastrar(nome_produtos, quantidade_produtos, preco_produtos)
        elif opcao == '2':
            mostrar(nome_produtos, quantidade_produtos, preco_produtos)
        elif opcao == '3':
            estoque_minimo(nome_produtos, quantidade_produtos)
        elif opcao == '4':
            reajuste_aumento(nome_produtos, preco_produtos)
        elif opcao == '5':
            alterar_nome(nome_produtos)
        elif opcao == '6':
            capitalize_nomes(nome_produtos)
        elif opcao == '7':
            print('Saindo...')
            break
        else:
            print('Opção inválida. Tente novamente.\n')


if __name__ == "__main__":
    main()

