#. Elabore uma estrutura para representar um Funcionario (código, nome, endereço, salário). Para o membro endereço deve-se criar outra estrutura Endereço (logradouro, número, bairro, cidade). Utilize aninhamento de estruturas para resolver este desenvolvimento. Construa uma função para cada opçao do menu a seguir:
#Menu de opções:

#Cadastrar funcionários
#Visualizar todos os dados
#Sair

class Funcionario:
    codigo = 0
    nome = ''
    endereco = ''
    salario = 0

class Endereco:
    logradouro = ''
    numero = 0
    bairro = ''
    cidade = ''

def cadastro(vet_cadastro):
    cadastramento_funcionario = Funcionario()
    cadastramento_funcionario.codigo = int(input('Cadastre o código do funcionário: '))
    cadastramento_funcionario.nome = input('Cadastre o nome do funcionário: ')
    cadastramento_funcionario.endereco = Endereco()
    cadastramento_funcionario.endereco.logradouro = input('Cadastre o nome da rua do funcionário: ')
    cadastramento_funcionario.endereco.numero = int(input('Cadastre o número da casa do funcionário: '))
    cadastramento_funcionario.endereco.bairro = input('Cadastre o bairro do funcionário: ')
    cadastramento_funcionario.endereco.cidade = input('Cadastre a cidade em que o funcionário mora: ')
    cadastramento_funcionario.salario = float(input('Cadastre o salário do funcionário: R$ '))
    vet_cadastro.append(cadastramento_funcionario)
    return vet_cadastro
    
def visualizar(vet_cadastro):
    #for funciionario in vet_cadastro:
     #   print('Código: ', funciionario.codigo, '\nNome: ',funciionario.nome, '\nLogradouro: ', funciionario.endereco.logradouro,
      #      '\nNúmero: ', funciionario.endereco.numero, '\nBairro: ', funciionario.endereco.bairro, 
       #     '\nCidade: ', funciionario.endereco.cidade, '\nSalário: ', funciionario.salario)
    for i in range(len(vet_cadastro)):
         print('Código: ', vet_cadastro[i].codigo, '\nNome: ',vet_cadastro[i].nome, '\nLogradouro: ', vet_cadastro[i].endereco.logradouro,
           '\nNúmero: ', vet_cadastro[i].endereco.numero, '\nBairro: ', vet_cadastro[i].endereco.bairro, 
           '\nCidade: ', vet_cadastro[i].endereco.cidade, '\nSalário: ', vet_cadastro[i].salario)

def main():
    vet_cadastro = []
    while True:
        print('Menu de opções:')
        print('1 - Cadastrar funcionários')
        print('2 - Visualizar todos os dados')
        print('3 - Sair')
        opcao = int(input('Qual opção deseja: '))
        if opcao == 3:
            print('Encerrando o programa....')
            break
        elif opcao == 1:
            vet_cadastro = cadastro(vet_cadastro)
        elif opcao == 2:
            visualizar(vet_cadastro)

main()