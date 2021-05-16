import { MutationTypes } from "./mutation-types";
import { MutationTree } from "vuex";
import { AuthState } from "./state";

export type Mutations<S = AuthState> = {
  [MutationTypes.SET_USER](state: S, payload: AuthState): void;
};

export const mutations: MutationTree<AuthState> & Mutations = {
  [MutationTypes.SET_USER](state, { token, user }) {
    state.token = token;
    state.user = user;
  },
};
