#5. Faça um programa que realize o cadastro de contas bancarias com as seguintes informações: numero da conta, nome do titular e saldo. O banco permitirá o cadastramento de 15 contas. Crie uma função para cada opção do menu a seguir. Utilize a estrutura na passagem de parâmetro:
#1.Cadastrar contas
#2.Visualizar todas as contas
#3.Consultar por nome
#4.Alterar nome e/ou saldo de um número de conta
#5.Excluir a conta com menor saldo
#6.Sair

class ContaBancaria:
    num_conta = 0
    nome = ''
    saldo = 0

def menu():
    print()
    print('-' * 50)
    print('Sistema para cadastro de aluno')
    print('1 - Cadastrar conta')
    print('2 - Visualizar todos as contas')
    print('3 - Consulta por nome')
    print('4 - Alterar nome e/ou saldo de um número de conta')
    print('5 - Excluir a conta com menor saldo')
    print('6 - Sair')
    print('-' * 50)
    return int(input('Qual opção deseja? '))

def cadastrar(inf_conta):
    print()
    for i in range(2):
        conta = ContaBancaria()
        conta.num_conta = int(input('Cadastre o número da conta: '))
        conta.nome = input('Cadastre o nome do titular da conta: ')
        conta.saldo = float(input('Informe o saldo da conta: R$ '))
        inf_conta.append(conta)
    return(inf_conta)

def visu(inf_conta):
    print()
    if len(inf_conta) > 0:
        for i in range(len(inf_conta)):
            print('Número da conta: ', inf_conta[i].num_conta,'\tNome do titular: ', inf_conta[i].nome,'\tSaldo: R$ ',inf_conta[i].saldo)
    else:
        print('Sem cadastro!!')

def consulta(inf_conta):
    print()
    nome_consultada = input('Digite o nome do titular para consultar: ')
    print()
    for i in range(len(inf_conta)):
        if inf_conta[i].nome == nome_consultada:
            print('Número da conta: ', inf_conta[i].num_conta,'\tNome do titular: ', inf_conta[i].nome,'\tSaldo: R$ ',inf_conta[i].saldo)

def alterar(inf_conta):
    print()
    conta_consultada = int(input('Informe a número da conta para consultar: '))
    for i in range(len(inf_conta)):
        if inf_conta[i].num_conta == conta_consultada:
            novo_nome = input('Cadastre o novo nome: ')
            inf_conta[i].nome = novo_nome
            novo_saldo = float(input('Cadastre o novo saldo: R$'))
            inf_conta[i].saldo = novo_saldo        
    return inf_conta

def excluir(inf_conta):
    for i in range(len(inf_conta)):
        if i == 0:
            menor = inf_conta[i].saldo
            i_menor = i
        if inf_conta[i].saldo < menor:
            menor = inf_conta[i].saldo
            i_menor = i
    for elemento in inf_conta:
        inf_conta.pop(i_menor)
    return inf_conta

         
def main():
    inf_conta = []
    while True:
        opcao = menu()
        if opcao == 6:
            print('Encerrando o programa....')
            break
        elif opcao == 1:
            inf_conta = cadastrar(inf_conta)
        elif opcao == 2:
            visu(inf_conta)
        elif opcao == 3:
            consulta(inf_conta)
        elif opcao == 4:
            inf_conta = alterar(inf_conta)
        elif opcao == 5:
            inf_conta = excluir(inf_conta)
            
main()