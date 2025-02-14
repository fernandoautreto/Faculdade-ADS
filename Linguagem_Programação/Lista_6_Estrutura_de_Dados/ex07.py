#Elabore uma estrutura para representar um Produto (código, nome, data_fabricacao, data_validade, preço). Para o membro data_fabricacao e data_validade, deve-se criar outra estrutura Data (dia, mês, ano). Utilize aninhamento de estruturas para resolver este desenvolvimento. Construa uma função para cada opçao do menu a seguir:
#Cadastrar produtos
#Visualizar todos os dados
#Sair

class Produto:
    codigo = 0
    nome = ''
    data_fabricacao = ''
    data_validade = ''
    preco = 0

class Data:
    dia = 0
    mes = 0
    ano = 0

def cadastro(vet_cadastro):
    cadastramento = Produto()
    cadastramento.codigo = int(input('Cadastre o código do produto: '))
    cadastramento.nome = input('Cadastre o nome do produto: ')
    cadastramento.data_fabricacao = Data()
    cadastramento.data_fabricacao.dia = int(input('Cadastre o dia de fabricação: '))
    cadastramento.data_fabricacao.mes = int(input('Cadastre o mês de fabricação: '))
    cadastramento.data_fabricacao.ano = int(input('Cadastre o ano de fabricação: '))
    cadastramento.data_validade = Data()
    cadastramento.data_validade.dia = int(input('Cadastre o dia da validade: '))
    cadastramento.data_validade.mes = int(input('Cadastre o mês da validade: '))
    cadastramento.data_validade.ano = int(input('Cadastre o ano da validade: '))
    cadastramento.preco = float(input('Cadastre o preço do produto: R$ '))
    vet_cadastro.append(cadastramento)
    return vet_cadastro

def visualizar(vet_cadastro):
   for produto in vet_cadastro:
        print('Código: ',produto.codigo, '\nNome: ', produto.nome, '\nData de fabricação: ',produto.data_fabricacao.dia,'/',produto.data_fabricacao.mes,'/',produto.data_fabricacao.ano, '\nData de validade: ',produto.data_validade.dia,'/',produto.data_validade.mes,'/',produto.data_validade.ano, '\nPreço: R$ ', produto.preco )
        
def main():
    vet_cadastro = []
    while True:
        print('-' * 50)
        print('Menu de opções:')
        print('1 - Cadastrar produto')
        print('2 - Visualizar todos os dados')
        print('3 - Sair')
        print('-' * 50)
        opcao = int(input('Qual opção deseja: '))
        print()
        if opcao == 3:
            print('Encerrando o programa....')
            break
        elif opcao == 1:
            vet_cadastro = cadastro(vet_cadastro)
        elif opcao == 2:
            visualizar(vet_cadastro)
        print()

main()